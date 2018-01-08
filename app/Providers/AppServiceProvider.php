<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    
        //DB::statement("SET lc_time_names = 'es_MX'");

    //     view()->composer('layouts.clients', function($view)
    // {
    //     $view->with(compact('listItems'));
    // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
                            
                           
}
