<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('layouts.frontend', function($view){
            $view->with([
                'categoriesKopi' => \App\Category::where('parent_id',1)->get(),
                'categoriesAlat' => \App\Category::where('parent_id',9)->get(),
                'categoriesArticle' => \App\ArticleCategory::get(),
            ]);
        });
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
