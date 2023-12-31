<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content\Banner;
use App\Models\Admin\Market\Brand;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $slideShowImages = Banner::query()->where('position',0)->where('status',1)->get();
        $topBanners = Banner::query()->where('position',1)->where('status',1)->take(2)->get();
        $middleBanners = Banner::query()->where('position',2)->where('status',1)->take(2)->get();
        $bottomBanner = Banner::query()->where('position',3)->where('status',1)->first();
        $brands = Brand::all();
        $mostVisitedProducts = Product::query()->latest()->take(10)->get();
        $offerProducts = Product::query()->latest()->take(10)->get();
        auth()->loginUsingId(10);
        return view('customer.home',compact('slideShowImages','topBanners','middleBanners','bottomBanner','brands','mostVisitedProducts','offerProducts'));
    }
}
