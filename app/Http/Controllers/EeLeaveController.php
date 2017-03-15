<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EeLeave;

use App\User;

class EeLeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function view(){
        $results = User::all()->load('eeleave');
        return view('/admin/setup/eeleave/view', compact('results'));
    }
    
    public function entry(){
        $results = User::all()->load('leave');
        return view('/admin/setup/eeleave/view', compact('results'));
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
