<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LeaveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeLeaveType();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    private function composeLeaveType(){
        view()->composer('leave.form',function($view){
           $view->with('leave_type',\App\Lookup::where('filter','leave_type')->lists('name','name'));
        });
        
        view()->composer('leave.statusform',function($view){
           $view->with('leave_type',\App\Lookup::where('filter','leave_type')->lists('name','name'));
        });
    }
}
