<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('clientBase.nav', function($view){
            $view->with('category', Categorie::take(4)->get());
        });

        View::composer('clientBase.footer', function($view){
            $view->with('category', Categorie::take(4)->get());
        });
    }
}
