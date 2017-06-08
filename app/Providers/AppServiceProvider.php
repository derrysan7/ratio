<?php

namespace App\Providers;

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
        view()->composer('layouts.sidebar', function ($view){
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    //use this method to register things into the service container
    public function register()
    {
        App::singleton('App\Billing\Stripe',function(){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });
    }
}
