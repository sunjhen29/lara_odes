<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\InterestRequest;
use App\Http\Requests\BatchFindRequest;
use App\Interest;
use App\Lookup;
use App\Batch;
use App\UserLog;
use Carbon\Carbon;
use App\JobNumber;
use App\Application;
use App\Events\EntryRecordCreated;
use App\Publication;


class InterestController extends Controller
{
    
    private $current_batch;
    
    private $jobnumber;
    
    private $keyword = 'interest';
    
    private $model;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('batch',['except'=>array('index','find')]);
        $this->middleware('check_application:Interest Auction Results,interest',['except'=>array('index','find')]);
        $this->middleware('start_entrytime',['only'=>array('entry','modify','verify')]);
        session('batch_details') ? $this->current_batch = Batch::findorfail(session('batch_details')->id) : false; 
        $this->model = new Interest();
    }
    
    public function index()
    {
        session()->forget('batch_name');
        session()->forget('jobnumber');
        return view($this->keyword.'.batch');
    }
    
    public function view()
    {
        $results = $this->current_batch->load(array($this->keyword.'s'=>function($query){
            $query->where('batch_name',session('batch_name'));
        })); 
        
        return view($this->keyword.'/view',compact('results'));
    }
    
    public function entry()
    {
        return view($this->keyword.'/entry');
    }
    
    public function create(InterestRequest $request){
        $interest = $this->current_batch->interests()->create($request->all());
        event(new EntryRecordCreated($this->current_batch,'E',session('batch_name'),$interest->id,session('jobnumber')->id));
        flash()->info('Successfully added a record.');
        return redirect()->back();
    }

    public function verify()
    {
        if ($record = Interest::where('batch_name',session('batch_name'))->where('status','E')->first()){
            return view('interest.verify',compact('record')); 
        } else {
            flash()->info('No Record to verify');
            return redirect('/interest/view');
        }
    }
    
    public function storeverify(Interest $record, InterestRequest $request)
    {
        $record->update($request->all());
        event(new EntryRecordCreated($this->current_batch,'V',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Verify Successful!');
        return redirect($this->keyword.'/verify');
    }
    
    public function modify($id)
    {   
        $record = $this->model->findorfail($id); 
        return view($this->keyword.'/modify',compact('record'));
    }
    
    public function update(InterestRequest $request,Interest $record) //must be changed
    {
        $record->update($request->all());
        event(new EntryRecordCreated($this->current_batch,'U',session('batch_name'),$record->id,session('jobnumber')->id));
        flash()->info('Update Successful!');
        return redirect($this->keyword.'/view');
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
    
    //custom function
    public function search($id){
         $result = Interest::where('listing_id',$id)->first();
         return \Response::json($result);
     }
}
