<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reanz;
use App\Http\Requests;
use App\Http\Requests\ReanzRequest;
use Carbon\Carbon;
use App\JobNumber;
use App\Application;
use App\Publication;
use App\Lookup;
use App\Batch;
use App\UserLog;
use App\Events\EntryRecordCreated;
use Goutte;
use App\UserProfile;


class ReaNZController extends Controller
{
    private $current_batch;
    
    private $folder = 'reanz';

    private $relationship = 'reanzs';

    private $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('batch',['except'=>array('index','find')]);
        $this->middleware('check_application:REA NZ Keying,reanz',['except'=>array('index','find')]);
        $this->middleware('start_entrytime',['only'=>array('entry','modify','verify')]);
        session('batch_details') ? $this->current_batch = Batch::findorfail(session('batch_details')->id) : false; 
        $this->model = new Reanz();
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
        return view($this->folder.'.view',compact('results'));
    }
    
    public function entry()
    {
        $results = $this->current_batch->load(array($this->folder.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));
        return view($this->folder.'.entry', compact('results'));
    }
    
    public function create(ReanzRequest $request){

        $reanz = $this->current_batch->reanzs()->save(new Reanz($request->all()));
        
        event(new EntryRecordCreated($this->current_batch,'E',session('batch_name'),$reanz->id,session('jobnumber')->id));
        flash()->info($reanz->listing_id.' Added Successfully');
        return redirect()->back();
    }
    
    public function modify($id)
    {   
        $results = $this->current_batch->load(array($this->folder.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));
        $record = $this->model->findorfail($id); 
        return view($this->folder.'.modify',compact('record', 'results'));
    }
    
    public function update(Request $request, Reanz $record)
    {
        $record->update($request->all());
        event(new EntryRecordCreated($this->current_batch,'U',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Update Successful!');
        return redirect('/reanz/view');
    }
    
    public function delete(Request $request)
    {
        
        $record = Reanz::findorfail($request->delete_id);
        $record->delete();
        $record->user_logs()->delete();
        
        event(new EntryRecordCreated($this->current_batch,'D',session('batch_name'),$record->id,session('jobnumber')->id));
        
        flash()->info('Deleted!');
        return redirect()->back();
    }
    
    public function search($id){
         //$result = Reanz::where('listing_id',$id)->first();
         //return \Response::json($result);


        $crawler = Goutte::request('GET', 'http://www.realestate.co.nz/'.$id);
        $crawler->filter('h2')->each(function ($node) {
            //dump($node->text());
        });


        $listed_date = str_replace('\n\r','',str_replace(' ','',$crawler->filter('h4')->text()));
        $property_address = $crawler->filterXpath('//h3')->count() ? $crawler->filterXpath('//span[@itemprop="streetAddress"]')->text().$crawler->filterXpath('//span[@itemprop="addressLocality"]')->text() : '';
        $property_id = $crawler->filter('h4 > b')->count() ? str_replace('Listing # ','',$crawler->filter('h4 > b')->text()) : '';
        $price = $crawler->filter('h2')->count() ? trim(str_replace('\n','',$crawler->filter('h2')->text())) : '';
        $agency = $crawler->filterXpath('//h5')->count() ? trim($crawler->filterXpath('//h5')->text().' '.$crawler->filterXpath('//p[@class="smallText"]')->text()) : '';
        $bedroom = $crawler->filterXpath('//li[@class="bedrooms"]')->count() ? trim(str_replace('Bedrooms','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="bedrooms"]')->text()))) : '';
        $bathroom = $crawler->filterXpath('//li[@class="bathrooms"]')->count() ? trim(str_replace('Bathroom','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="bathrooms"]')->text()))) : '';
        $car = $crawler->filterXpath('//li[@class="carParks"]')->count() ? trim(str_replace('Car Spaces','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="carParks"]')->text()))) : '';
        $land = $crawler->filterXpath('//li[@class="landArea"]')->count() ? trim(str_replace('Land','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="landArea"]')->text()))) : '';
        $floor = $crawler->filterXpath('//li[@class="floorArea"]')->count() ? trim(str_replace('Floor','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="floorArea"]')->text()))) : '';
        $auction_date = $crawler->filter('h6')->count() ? str_replace('Auction ','',$crawler->filter('h6')->text()) : '';

        $agent_name01 = $crawler->filterXpath('//h5[@class="fn agent"]')->eq(0)->text();
        $agent_mobile01 = str_replace('M ','',$crawler->filterXpath('//li[@itemprop="telephone"]')->eq(0)->text());

        $agent_name02 = $crawler->filterXpath('//h5[@class="fn agent"]')->eq(1)->text();

        $count = $crawler->filterXpath('//li[@itemprop="telephone"]')->count();

        if($agent_name01 == $agent_name02){
            $agent_name02 = '';
            $agent_mobile02 = '';
        }else {
            $agent_name02 = $crawler->filterXpath('//h5[@class="fn agent"]')->eq(1)->text();
            if($count == 8) {
                $agent_mobile02 = str_replace('M ', '', $crawler->filterXpath('//li[@itemprop="telephone"]')->eq(2)->text());
            } else {
                $agent_mobile02 = str_replace('M ', '', $crawler->filterXpath('//li[@itemprop="telephone"]')->eq(3)->text());
            }
        }
        $bedroom = preg_replace('/[^0-9]/','',$bedroom);
        $bath = preg_replace('/[^0-9]/','',$bathroom);
        $car = preg_replace('/[^0-9]/','',$car);
        $listed_date = substr($listed_date,strpos($listed_date,'Listed')+ 6);
        $listed_date = Carbon::createFromFormat('dMY', $listed_date)->format('d/m/Y');

        if($auction_date){
            $auction_date = substr($auction_date,strpos($auction_date,'day')+ 4);
            $auction_date = Carbon::createFromFormat('d M g:ia', $auction_date)->format('d/m/Y');
        }

        if($price == 'Auction' || $price == 'Deadline Treaty'){
            $price = '';
        }



        $details = array($property_address,$property_id,$price,$agency,$bedroom,$bath,$car,$land,$floor,$agent_name01,$agent_mobile01,$agent_name02,$agent_mobile02,$listed_date,$auction_date,$count);
        return \Response::json($details);

        //return $details;


     }
}
