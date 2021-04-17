<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use NascentAfrica\Jetstrap\JetstrapFacade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
        JetstrapFacade::useCoreUi3();
    }
}
