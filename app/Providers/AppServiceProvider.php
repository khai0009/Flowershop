<?php

namespace App\Providers;
use App\View\Composers\CartComposer;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    Facades\View::composer('partials.cart_summary', \App\View\Composers\CartComposer::class);
}
}
