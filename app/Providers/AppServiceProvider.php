<?php

namespace App\Providers;

// use \App\Billing\Stripe;
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
            //pass array with method, cleaner solution
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
            
            // $view->with('archives', \App\Post::archives());
            // $view->with('tags', \App\Tag::has('posts')->pluck('name'));
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
        // $this->app->App::singleton(Stripe::class,function(){
        //     return new Stripe(config('services.stripe.secret'));
        // });
    }
}
