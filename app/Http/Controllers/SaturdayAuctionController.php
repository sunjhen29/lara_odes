<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Event\SchemaAlterTableAddColumnEventArgs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RecentSaleRequest;
use App\Recent_Sale;
use App\Batch;
use App\Events\EntryRecordCreated;
use App\UserProfile;
use App\AUPostCode;
use App\Sat_Auction;
use App\ScrapeSatAuction;

use Goutte;
use Carbon\Carbon;

use Goutte\Client;

class SaturdayAuctionController extends Controller
{
    private $current_batch;

    private $folder = 'sat_auction';

    private $relationship = 'recent_sales';

    private $model;

    private $suburb = [];
    private $locality = '';
    private $property_type = ['Townhouse'=>'UN','House'=>'HO','Apartment'=>'UN','Unit'=>'UN','Villa'=>'UN','Land'=>'LA','Commercial'=>'CO','Farm'=>'FA','Flat/Unit/Apartment'=>'UN','Flat'=>'UN','Block of Flats'=>'UN'];
    private $sale_type = ['Auction Sale'=>'Sold At Auction','Passed in at Auction'=>'Passed In','Sold Before Auction'=>'Sold Prior To Auction','Passed in Vendor Bid'=>'Vendor Bid','Sold After Auction'=>'Sold After Auction'];
    private $count = 0;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('batch',['except'=>array('index','find')]);
        $this->middleware('check_application:Saturday Auction,sat_auction',['except'=>array('index','find')]);
        $this->middleware('start_entrytime',['only'=>array('entry','modify','verify')]);
        session('batch_details') ? $this->current_batch = Batch::findorfail(session('batch_details')->id) : false;
        $this->model = new Recent_Sale();
    }

    public function index()
    {
        session()->forget('batch_name');
        session()->forget('jobnumber');
        session()->forget('batch_details');
        $results = UserProfile::where('user_id',\Auth::guard('web')->user()->id)->first();
        return view($this->folder.'.batch',compact('results'));
    }

    public function view()
    {
        $results = $this->current_batch->load(array($this->relationship=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));

        return view($this->folder.'/view',compact('results'));
    }

    public function entry()
    {
        return view($this->folder.'/entry');
    }

    public function create(RecentSaleRequest $request){
        $record = $this->current_batch->recent_sales()->create($request->all());
        event(new EntryRecordCreated($this->current_batch,'E',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info($record->address.' added successfully.');
        session()->put('last_record',$record);
        return redirect()->back();
    }

    public function verify()
    {
        if ($record = $this->model->where('batch_name',session('batch_name'))->where('status','E')->first()){
            return view($this->folder.'/verify',compact('record'));
        } else {
            flash()->info('No Record to verify');
            return redirect($this->folder.'/view');
        }
    }

    public function storeverify(Recent_Sale $record, RecentSaleRequest $request)
    {
        $record->update($request->all());
        event(new EntryRecordCreated($this->current_batch,'V',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Verify Successful!');
        return redirect($this->folder.'/verify');
    }

    public function modify($id)
    {
        $record = $this->model->findorfail($id);
        return view($this->folder.'/modify',compact('record'));
    }

    public function update(RecentSaleRequest $request,Recent_Sale $record) //must be changed
    {
        $record->update($request->all());
        event(new EntryRecordCreated($this->current_batch,'U',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Update Successful!');
        return redirect($this->folder.'/view');
    }

    public function delete(Request $request)
    {
        $record = $this->model->findorfail($request->delete_id);
        $record->delete();
        $record->user_logs()->delete();
        event(new EntryRecordCreated($this->current_batch,'D',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Deleted!');
        return redirect()->back();
    }

    //custom functions
    public function search_postcode($suburb,$state){
        $post_code = AUPostCode::where('suburb',$suburb)->where('state',$state)->first();
        return \Response::json($post_code);
    }

    public function search_property($address){
        $rp_data = Sat_Auction::where('slug',$address)->first();
        $scrape = ScrapeSatAuction::where('slug',$address)->first();

        $details = [];
        if (!$rp_data AND !$scrape){
            $details['message'] = 'No Record Found!! Please check your entry';
        }else{

            $details['state'] = $rp_data ? $rp_data->state : $scrape->state;
            $details['agency_name'] = $rp_data ? $rp_data->agency_name : $scrape->agency_name;
            $details['bedroom'] = $rp_data ? $rp_data->bedroom : $scrape->bedroom;
            $details['bathroom'] = $rp_data ? $rp_data->bathroom : '';
            $details['car'] = $rp_data ? $rp_data->car : '';
            $details['property_type'] = $rp_data ? $rp_data->property_type : $scrape->property_type;
            $details['sold_price'] = $scrape ? $scrape->sold_price : '';
            $details['sale_type'] = $scrape ? $scrape->sale_type : '';
            $details['contract_date'] = $scrape ? $scrape->contract_date : '';
            $details['color']= $rp_data ? '#ffffe6' : '#e6fff2';
        }


        return \Response::json($details);
    }

    public function scrape($page){
        $link = array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        $url = 'https://propertydata.realestateview.com.au/propertydata/auction-results/victoria/'.$link[$page].'/#alphabet_links';
        $client = new \Goutte\Client();
        $guzzleClient = new \GuzzleHttp\Client(array(
            'timeout' => 90,
            'verify' => false,
        ));
        $client->setClient($guzzleClient);
        $crawler = $client->request('get',$url);

        $this->suburb = $crawler->filterXPath('//div[@class="pd-content-heading-dark-inner"]')->each(function($node){
           return str_replace(' Sales & Auction Results','',trim($node->text()));
        });

        //Sat_Auction::truncate();

        $crawler->filterXPath('//div[@class="pd-table-inner"]')->each(function($rows,$i){
            $this->locality = $this->suburb[$i];
            $rows->filterXpath('//tr')->each(function($data,$x){
                if ($x != 0){
                    if(trim($data->filter('td')->eq(4)->text()) != 'Private Sale')
                    {
                        $record = new ScrapeSatAuction();
                        $record->state = 'vic';
                        $record->street_name = trim(str_replace("\t",'',str_replace("\n", '', mb_convert_encoding($data->filter('td')->eq(0)->text(),'UTF-8'))));

                        $record->suburb = $this->locality;
                        $record->bedroom = trim($data->filter('td')->eq(1)->text()) != '-' ? trim($data->filter('td')->eq(1)->text()) : '';


                        $record->property_type = $this->property_type[trim($data->filter('td')->eq(3)->text())];
                        $record->sale_type = $this->sale_type[trim($data->filter('td')->eq(4)->text())];
                        if($record->sale_type == 'Passed In' || $record->sale_type == 'Withdrawn'){
                            $record->sold_price = '';
                        } else {
                            $record->sold_price = trim($data->filter('td')->eq(2)->text()) != 'undisclosed' ? intval(preg_replace('/[^0-9]+/', '', trim($data->filter('td')->eq(2)->text()))) : 'Undisclosed';
                        }
                        $record->contract_date = Carbon::createFromFormat('d/m/Y',trim($data->filter('td')->eq(5)->text()))->toDateString();;
                        $record->agency_name = trim($data->filter('td')->eq(6)->text());
                        $record->slug = str_slug(trim(str_replace("\n", '', 'vic ' . $data->filter('td')->eq(0)->text())) . ' ' . $this->locality, '-');
                        $record->save();
                        $this->count++;
                        echo $record->address;
                    }
                }
            });
        });

        echo $this->count." records.";

        $next = $page + 1;

        if($next <= 26){
            return redirect('/sat_auction/scrape/'.$next);
        } else {
            return "Finished Scraping";
        }

    }

}
