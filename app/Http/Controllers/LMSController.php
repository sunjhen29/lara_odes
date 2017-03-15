<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserLeaves;

class LMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function view(){
        $results = UserLeaves::where('status', '<>', ' ')->get();
        $approved = UserLeaves::where('status', 'APPROVED')->get();
        $pending = UserLeaves::where('status', 'PENDING')->get();
        $declined = UserLeaves::where('status', 'DECLINED')->get();
        $all = UserLeaves::where('status', '<>', ' ')->get();
        return view('/admin/lms/view', compact('results', 'approved', 'pending', 'declined', 'all'));
    }
    
    public function approved(){
        $results = UserLeaves::where('status','APPROVED')->get();
        $approved = UserLeaves::where('status','APPROVED')->get();
        $pending = UserLeaves::where('status', 'PENDING')->get();
        $declined = UserLeaves::where('status', 'DECLINED')->get();
        $all = UserLeaves::where('status', '<>', ' ')->get();
        return view('/admin/lms/view', compact('results', 'approved', 'pending', 'declined', 'all'));
    }
    
    public function pending(){
        $results = UserLeaves::where('status','PENDING')->get();
        $pending = UserLeaves::where('status','PENDING')->get();
        $approved = UserLeaves::where('status', 'APPROVED')->get();
        $declined = UserLeaves::where('status', 'DECLINED')->get();
        $all = UserLeaves::where('status', '<>', ' ')->get();
        return view('/admin/lms/view', compact('results', 'pending', 'approved', 'declined', 'all'));
    }
    
    public function declined(){
        $results = UserLeaves::where('status','DECLINED')->get();
        $declined = UserLeaves::where('status','DECLINED')->get();
        $approved = UserLeaves::where('status','APPROVED')->get();
        $pending = UserLeaves::where('status', 'PENDING')->get();
        $all = UserLeaves::where('status', '<>', ' ')->get();
        return view('/admin/lms/view', compact('results', 'declined', 'approved', 'pending', 'all'));
    }
    
    public function forapproval(UserLeaves $result){
        $result->update(['status'=>'APPROVED']);
        return redirect()->back();
    }
    
    public function fordeclinement(UserLeaves $result){
        $result->update(['status'=>'DECLINED']);
        return redirect()->back();
    }
    
    public function create(){
        $results = User::all()->load('leave');
        return view('/admin/setup/eeleave/view', compact('results'));
    }
    
    public function edit(Leave $results){
        return view('admin.setup.eeleave.edit', compact('results'));
    }
    
    public function update(Request $request, Leave $results){
        $results->update($request->all());
        return redirect('admin/setup/eeleave/view');
    }
 
}
