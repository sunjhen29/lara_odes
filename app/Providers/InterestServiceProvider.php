<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeStreetExtension();

        $this->composeSaleType();
 
        $this->composePropertyType();

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
    
    private function composeStreetExtension(){
        view()->composer('interest.form',function($view){
           $view->with('street_extension',\App\Lookup::where('filter','street_extension')->lists('name','name'));
        });
    }
    
    
    private function composeSaleType(){
        view()->composer('interest.form',function($view){
           $view->with('sale_type',\App\Lookup::where('filter','sale_type')->lists('name','name'));
        });
    }

    private function composeAgencyName(){

    }


    
    private function composePropertyType(){
        view()->composer('interest.form',function($view){
           $view->with('prop_type',\App\Lookup::where('filter','prop_type')->lists('name','name'));
        });
    }
    
}
