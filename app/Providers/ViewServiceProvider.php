<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
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
        View::composer('adminBase.nav', function($view){
            $view->with('auth', Auth::user());
        });

        View::composer('clientBase.nav', function($view){
            $view->with('category', Categorie::getTempCategories());
        });

        View::composer('clientBase.footer', function($view){
            $view->with('category', Categorie::getTempCategories());
        });
    }
}
