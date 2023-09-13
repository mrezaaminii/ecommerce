<?php

namespace App\Providers;

use App\Models\Admin\Content\Comment;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
        View::composer('admin.layouts.header',function ($view){
            $view->with('unSeenComments',Comment::where('seen',0)->get());
        });
    }
}
