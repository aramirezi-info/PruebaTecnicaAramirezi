<?php

namespace App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use App\PlacetoPay\WebChekOut;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WebChekOut::class, function(Application $app){
            return new WebChekOut(
                config('placetopay.url'),
                config('placetopay.login'),
                config('placetopay.trankey')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
