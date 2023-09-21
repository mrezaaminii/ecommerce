@extends('customer.layouts.master-one-col')
@php
use App\Helpers\helper;
@endphp
@section('content')
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    @foreach($slideShowImages as $slideShowImage)
                        <section class="item">
                            <a class="w-100 d-block h-auto text-decoration-none" href="{{urldecode($slideShowImage->url)}}">
                                <img class="w-100 rounded-2 d-block h-auto" src="{{asset($slideShowImage->image)}}" alt="{{$slideShowImage->title}}">
                            </a>
                        </section>
                    @endforeach
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                @foreach($topBanners as $topBanner)
                    <section class="mb-2"><a href="{{urldecode($topBanner->url)}}" class="d-block"><img class="w-100 rounded-2" src="{{asset($topBanner->image)}}" alt="{{$topBanner->title}}"></a></section>
                @endforeach
            </section>
        </section>
    </section>
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach($mostVisitedProducts as $mostVisitedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
{{--                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>--}}
{{--                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>--}}
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="{{asset($mostVisitedProduct->image['indexArray']['medium'])}}" alt="{{$mostVisitedProduct->title}}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>{{Str::limit($mostVisitedProduct->name,20)}}</h3></section>
                                                    <section class="product-price-wrapper">
{{--                                                        <section class="product-discount">--}}
{{--                                                            <span class="product-old-price"></span>--}}
{{--                                                            <span class="product-discount-amount">10%</span>--}}
{{--                                                        </section>--}}
                                                        <section class="product-price">{{helper::priceFormat($mostVisitedProduct->price)}} تومان</section>
                                                    </section>
{{--                                                    <section class="product-colors">--}}
{{--                                                        <section class="product-colors-item" style="background-color: white;"></section>--}}
{{--                                                        <section class="product-colors-item" style="background-color: blue;"></section>--}}
{{--                                                        <section class="product-colors-item" style="background-color: red;"></section>--}}
{{--                                                    </section>--}}
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row py-4">
                @foreach($middleBanners as $middleBanner)
                <section class="col-12 col-md-6 mt-2 mt-md-0">
                    <a href="{{urldecode($middleBanner->url)}}">
                    <img class="d-block rounded-2 w-100" src="{{$middleBanner->image}}" alt="{{$middleBanner->title}}">
                    </a>
                </section>
                @endforeach
            </section>

        </section>
    </section>
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach($offerProducts as $offerProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{--                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>--}}
                                                {{--                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>--}}
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="{{asset($offerProduct->image['indexArray']['medium'])}}" alt="{{$offerProduct->name}}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>{{Str::limit($offerProduct->name,20)}}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        {{--                                                        <section class="product-discount">--}}
                                                        {{--                                                            <span class="product-old-price"></span>--}}
                                                        {{--                                                            <span class="product-discount-amount">10%</span>--}}
                                                        {{--                                                        </section>--}}
                                                        <section class="product-price">{{helper::priceFormat($offerProduct->price)}} تومان</section>
                                                    </section>
                                                    {{--                                                    <section class="product-colors">--}}
                                                    {{--                                                        <section class="product-colors-item" style="background-color: white;"></section>--}}
                                                    {{--                                                        <section class="product-colors-item" style="background-color: blue;"></section>--}}
                                                    {{--                                                        <section class="product-colors-item" style="background-color: red;"></section>--}}
                                                    {{--                                                    </section>--}}
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    @if(!empty($bottomBanner))
        <section class="mb-3">
            <section class="container-xxl">
                <section class="row py-4">
                        <section class="col-12 mt-2 mt-md-0">
                            <a href="{{urldecode($bottomBanner->url)}}">
                                <img class="d-block rounded-2 w-100" src="{{$bottomBanner->image}}" alt="{{$bottomBanner->title}}">
                            </a>
                        </section>
                </section>

            </section>
        </section>
    @endif
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row py-4">
                <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/one-col-1.jpg" alt=""></section>
            </section>

        </section>
    </section>
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <section class="brands-wrapper py-4" >
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach($brands as $brand)
                            <section class="item">
                                <section class="brand-item">
                                    <a href=""><img class="rounded-2" src="{{asset($brand->logo['indexArray']['medium'])}}" alt="{{$brand->original_name}}"></a>
                                </section>
                            </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection
