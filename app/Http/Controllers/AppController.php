<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Application;

class AppController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index(){
        $applications = Application::where('status','Active')->get();
        return view('dataentry',compact('applications'));
    }

    public function profile(){
        $applications = Application::where('status','Active')->get();
        return view('profile',compact('applications'));
    }

}
