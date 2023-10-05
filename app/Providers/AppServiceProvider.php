<?php

namespace App\Providers;

use App\Models\Admin\Content\Comment;
use App\Models\Market\CartItem;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
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
            $view->with('notifications',Notification::where('read_at',null)->get());
        });

        View::composer('customer.layouts.header',function ($view){
            if (Auth::check()){
                $cartItems = CartItem::query()->where('user_id',auth()->id())->get();
                $view->with('cartItems',$cartItems);
            }
        });


    }
}
