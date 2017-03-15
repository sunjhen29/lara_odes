<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InterestBackup extends Controller
{
    private $current_batch;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('batch',['except'=>array('index','find')]);
        $this->middleware('check_application:Interest Auction Results,interest',['except'=>array('index','find')]);
        $this->middleware('start_entrytime',['only'=>array('entry','modify','verify')]);
        $this->current_batch = Batch::findorfail(session('batch_details')->id);
    }
    
    public function index()
    {
        return view('interest.batch');
    }
    
    public function find(BatchFindRequest $request)
    {
        $batch_date = Carbon::createFromFormat('d/m/Y',$request->batch_date)->format('Y-m-d');
        
        $batch = Batch::where('job_name',$request->job_name)->where('batch_date',$batch_date)->first();
        $job_number = JobNumber::where('application',$batch->application)->first();

        if($batch && $job_number){
            session()->put('batch_details',$batch);
            session()->put('jobnumber_id',$job_number->id);
            session()->put('batch_name',$request->batch_name);
            return redirect('/interest/view');
        } else {
            flash()->info('No Record found!!');
            return redirect()->back()->withInput();
        }
        
    }
    
    public function view()
    {
        //$results = Batch::findorfail(session('batch_details')->id)->interests->where('batch_name',session('batch_name')); 
        $results = $this->current_batch->interests->where('batch_name',session('batch_name')); 
        return view('interest.view',compact('results'));
    }
    
    public function entry()
    {
        return view('interest.entry');
    }
    
    public function create(InterestRequest $request){

        $batch = Batch::findorfail(session('batch_details')->id);
        $request['status'] = 'E';
        $interest = $batch->interests()->save(new Interest($request->all()));
        
        event(new EntryRecordCreated($batch,'E',session('batch_name'),$interest->id,session('jobnumber_id')));
        
        flash()->info('Success');
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
    
    public function storeverify(Interest $interest, Request $request)
    {
        $request['status'] = 'V';
        $interest->update($request->all());
        
        $interest->batch->entry_logs()->create([
            'batch_name'=>session('batch_name'),
            'record_id'=>$interest->id,
            'batch_id'=> $interest->batch->id,
            'user_id'=>\Auth::guard("web")->user()->id,
            'jobnumber_id' => session('jobnumber_id'),
            'start'=>session('start'),
            'action'=>'V'
        ]);
        
        flash()->info('Verify Successful!');
        return redirect('/interest/verify');
    }
    
    public function modify($id)
    {   
        $record = Interest::findorfail($id); 
        return view('interest.modify',compact('record'));
    }
    
    public function update(InterestRequest $request,Interest $interest)
    {
        $interest->update($request->all());

        $interest->batch->entry_logs()->create([
            'batch_name'=>session('batch_name'),
            'record_id'=>$interest->id,
            'batch_id'=> $interest->batch->id,
            'user_id'=>\Auth::guard("web")->user()->id,
            'jobnumber_id' => session('jobnumber_id'),
            'start'=>session('start'),
            'action'=>'U'
        ]);
        
        flash()->info('Update Successful!');
        return redirect('/interest/view');
    }
    
    public function delete(Request $request)
    {
        $batch = Batch::findorfail(session('batch_details')->id);
        $interest = Interest::findorfail($request->delete_id);
        $interest->delete();
        $interest->user_logs()->delete();
        
        $batch->entry_logs()->create([
            'batch_name'=>session('batch_name'),
            'record_id'=>$request->delete_id,
            'batch_id'=> $batch->id,
            'user_id'=>\Auth::guard("web")->user()->id,
            'jobnumber_id' => session('jobnumber_id'),
            'start'=>session('start'),'action'=>'D'
        ]);
        
        flash()->info('Deleted!');
        return redirect()->back();
    }
}
