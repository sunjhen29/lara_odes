<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Batch;
use App\Publication;
use App\JobNumber;
use App\AUPostCode;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index(){
        return view('admin.dashboard');
    }
    
    public function showuser(){
        return view('admin.sysusers');
    }
    
    public function showjobnumber(){
        return view('admin.jobnumbers');
    }
    
    public function showinterest(){
        $batches = Batch::where('application','Interest Auction Results')->get();
        return view('admin.batch.interest',compact('batches'));
    }
    
    public function showaunews(){
        $batches = Batch::where('application','Australian Newspapers')->get();
        return view('admin.batch.aunews',compact('batches'));
    }
    
     public function showreanz(){
        $batches = Batch::where('application','REA NZ Keying')->get();
        return view('admin.batch.reanz',compact('batches'));
    }
    
    public function showproduction(){
        return view('admin.report.production');
    }
    
    public function showinterestexport(){
        $results = null;
        $default_date = Carbon::now()->format('d/m/Y');
        return view('admin.export.interest',compact('results','default_date'));
    }
    
    public function logout(){
        Auth::guard('admin')->user()->logout();
        session()->flush();
        return \Redirect::view('/');
    }
    
    
    
    
    
   
    
}
