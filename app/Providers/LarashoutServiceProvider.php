<?php

namespace App\Providers;

use App\Larashout\Larashout;
use Illuminate\Support\ServiceProvider;

class LarashoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('larashout',function(){

            return new Larashout();

    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
