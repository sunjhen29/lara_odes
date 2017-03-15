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

class ReaNZController extends Controller
{
    private $current_batch;
    
    private $jobnumber;
    
    private $keyword = 'reanz';
    
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
        return view($this->keyword.'.batch');
    }
    
    public function view()
    {
        $results = $this->current_batch->load(array($this->keyword.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));
        return view($this->keyword.'.view',compact('results'));
    }
    
    public function entry()
    {
        $results = $this->current_batch->load(array($this->keyword.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));
        //return view($this->keyword.'.entry', compact('results'));
        
        $crawler = Goutte::request('GET', 'http://www.realestate.co.nz/3007830');
        $crawler->filter('h2')->each(function ($node) {
          //dump($node->text());
        });
        
        
        
        $address = $crawler->filterXpath('//h3')->count() ? $crawler->filterXpath('//span[@itemprop="streetAddress"]')->text().$crawler->filterXpath('//span[@itemprop="addressLocality"]')->text() : '';
        $listing_no = $crawler->filter('h4 > b')->count() ? str_replace('Listing # ','',$crawler->filter('h4 > b')->text()) : '';
        $price = $crawler->filter('h2')->count() ? trim(str_replace('\n','',$crawler->filter('h2')->text())) : '';
        $agency = $crawler->filterXpath('//h5')->count() ? trim($crawler->filterXpath('//h5')->text().' '.$crawler->filterXpath('//p[@class="smallText"]')->text()) : '';
        $bedroom = $crawler->filterXpath('//li[@class="bedrooms"]')->count() ? trim(str_replace('Bedrooms','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="bedrooms"]')->text()))) : '';
        $bathroom = $crawler->filterXpath('//li[@class="bathrooms"]')->count() ? trim(str_replace('Bathroom','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="bathrooms"]')->text()))) : '';
        $car = $crawler->filterXpath('//li[@class="carParks"]')->count() ? trim(str_replace('Car Spaces','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="carParks"]')->text()))) : '';
        $land = $crawler->filterXpath('//li[@class="landArea"]')->count() ? trim(str_replace('Land','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="landArea"]')->text()))) : '';
        $floor = $crawler->filterXpath('//li[@class="floorArea"]')->count() ? trim(str_replace('Floor','',str_replace(' ',' ',$crawler->filterXpath('//li[@class="floorArea"]')->text()))) : '';

        $agent_name01 = $crawler->filterXpath('//h5')->eq(1)->text();
        $agent_name02 = $crawler->filterXpath('//h5')->eq(2)->text();
        $agent_mobile01 = $crawler->filterXpath('//li[@itemprop="telephone"]')->eq(0)->text();
        $agent_mobile02 = $crawler->filterXpath('//li[@itemprop="telephone"]')->eq(2)->text();

        $details = array($address,$listing_no,$price,$agency,$bedroom,$bathroom,$car,$land,$floor);
        
        
        return $details;
    }
    
    public function create(ReanzRequest $request){

        $reanz = $this->current_batch->reanzs()->save(new Reanz($request->all()));
        
        event(new EntryRecordCreated($this->current_batch,'E',session('batch_name'),$reanz->id,session('jobnumber')->id));
        flash()->info('Success');
        return redirect()->back();
    }
    
    public function modify($id)
    {   
        $results = $this->current_batch->load(array($this->keyword.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        }));
        $record = $this->model->findorfail($id); 
        return view($this->keyword.'.modify',compact('record', 'results'));
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
         $result = Reanz::where('listing_id',$id)->first();
         return \Response::json($result);
     }
}
