<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserLeaves;
use App\Leave;

class UserLeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view(){
        $results = User::findorfail (\Auth::guard('web')->user()->id)->load('leave','leaves');
        return view('/leave/view', compact('results'));
    }
    
     public function entry(){
        return view('leave.add');
    }
    
    public function create(Request $request){
        $leave = UserLeaves::create($request->all());
        return redirect('leave/view');
    }
    
    public function modify($id){
        $results = UserLeaves::findorfail($id);
        return view('leave.edit', compact('results'));
    }
    
    public function update(Request $request, UserLeaves $results){
        $results->update($request->all());
        return redirect('leave/view');
    }
    
    public function delete(Request $request)
    {
        $record = UserLeaves::findorfail($request->delete_id);
        $record->delete();
        
        flash()->info('Deleted!');
        return redirect()->back();
    }
    
    public function status(UserLeaves $result){
        $result->update(['status'=>'PENDING']);
        
        return redirect()->back();
    }
  
    public function statusupdate(Request $request, UserLeaves $results){
        $results->update($request->all());
        $results = User::findorfail (\Auth::guard('web')->user()->id)->load('leave','leaves');
        return view('/leave/view', compact('results'));
    }
    
}