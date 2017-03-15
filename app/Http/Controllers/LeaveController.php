<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Leave;
use App\User;

use Carbon\Carbon;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminview(){
        $results = User::all()->load('leave');
        return view('/admin/setup/leave/view', compact('results'));
    }
    
    public function edit(Leave $results){
        return view('admin.setup.leave.edit', compact('results'));
    }
    
    public function save(Request $request, Leave $results){
        $results->update($request->all());
        return redirect('admin/setup/leave/view');
    }
    
}
