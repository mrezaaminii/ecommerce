@extends('customer.layouts.master-two-col')

@php
    use App\Helpers\helper;
@endphp
@section('head-tag')
    <title>سبد خرید</title>
    <style>
        .delete:focus,.delete:active{
            outline: none;
            border: none;
            box-shadow: none;
        }
    </style>
@endsection
@section('content')
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <form action="" id="cart_items" class="content-wrapper bg-white p-3 rounded-2">
                                @csrf
                                @php
                                    $totalPrice = 0;
                                    $totalDiscount = 0;
                                    $number = 0;
                                @endphp
                                @foreach ($cartItems as $cartItem)
                                    @php
                                        $totalPrice += $cartItem->cartItemProductPrice();
                                        $totalDiscount += $cartItem->cartItemProductDiscount();
                                    @endphp
                                    <section class="cart-item d-md-flex py-3" id="{{$number}}" data-id="{{$number}}">
                                        <section class="cart-img align-self-start flex-shrink-1"><img
                                                src="{{ asset($cartItem->product->image['indexArray']['medium']) }}"
                                                alt=""></section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{ $cartItem->product->name }}</p>
                                            @if (!empty($cartItem->color))
                                                <p><span style="background-color: {{ $cartItem->color->color }};"
                                                         class="cart-product-selected-color me-1"></span> <span>
                                                        {{ $cartItem->color->name }}</span></p>
                                            @endif
                                            @if (!empty($cartItem->guarantee))
                                                <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> {{ $cartItem->guarantee->name }}</span></p>
                                            @endif
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا
                                                    موجود در انبار</span></p>
                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-</button>
                                                    <input class="number" name="number" data-product-price="{{ $cartItem->cartItemProductPrice() }}" data-product-discount="{{ $cartItem->cartItemProductDiscount() }}" type="number" min="1" max="5"
                                                           step="1" value="{{ $cartItem->number }}" readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                                <button type="button" class="btn btn-sm ms-4 cart-delete delete" data-url="{{route('customer.sales-process.remove-from-cart',$cartItem)}}"><i class="fa fa-trash-alt"></i> حذف از سبد</button>

                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            @if (!empty($cartItem->product->activeAmazingSales()))
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف
                                                    {{ helper::priceFormat($cartItem->cartItemProductDiscount()) }}
                                                </section>
                                            @endif
                                            <section class="text-nowrap fw-bold">
                                                {{ helper::priceFormat($cartItem->cartItemProductPrice()) }} تومان</section>
                                        </section>
                                    </section>
                                    @php
                                        $number++;
                                    @endphp
                                @endforeach
                            </form>
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cartItems->count() }})</p>
                                    <p class="text-muted" id="total_product_price">{{ helper::priceFormat($totalPrice) }}
                                        تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder" id="total_discount">
                                        {{ helper::priceFormat($totalDiscount) }} تومان</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder" id="total_price">
                                        {{ helper::priceFormat($totalPrice - $totalDiscount) }} تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت
                                    سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید.
                                    نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این
                                    سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="address.html" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>

    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($relatedProducts as $relatedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                <section class="product-add-to-favorite"><a href="#"
                                                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                            title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a>
                                                </section>
                                                <a class="product-link" href="{{ route('customer.market.product',$relatedProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="{{ asset($relatedProduct->image['indexArray']['medium']) }}"
                                                             alt="">
                                                    </section>
                                                    <section class="product-name">
                                                        <h3>پکیج آموزش خطاطی و خوشنویسی با کد 624</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-price">115,000 تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($relatedProduct->colors as $color)
                                                            <section class="product-colors-item"
                                                                     style="background-color: {{ $color->color }};">
                                                            </section>
                                                        @endforeach
                                                    </section>
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
@endsection

@section('script')
    {{--    @include('admin.alerts.sweetalert.delete-confirm',['className' => 'delete'])--}}
    <script>
        $(document).ready(function() {
            bill();
            $(".cart-number").click(function(e) {
                bill();
            });
        });

        function bill(){
            var total_product_price = 0;
            var total_discount = 0;
            var total_price= 0;

            $('.number').each(function () {
                var productPrice = parseFloat($(this).data('product-price'))
                var productDiscount = parseFloat($(this).data('product-discount'))
                var number = parseFloat($(this).val())

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            })
            total_price = total_product_price - total_discount;
            $('#total_product_price').html(toFarsiNumber(total_product_price))
            $('#total_discount').html(toFarsiNumber(total_discount))
            $('#total_price').html(toFarsiNumber(total_price))
        }
        function toFarsiNumber(number){
            const farsiDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
            number = new Intl.NumberFormat().format(number);
            return number.toString().replace(/\d/g,x => farsiDigits[x]);
        }
    </script>
    <script>
        $('.delete').click(function () {
            var element = $(this);
            var url = $(this).data('url')
            var id = $('.cart-item').data('id')
            $.ajax({
                url:url,
                type: "GET",
                success:function (response) {
                   if (response.status == 1){
                        $('#' + id).remove()
                   }
                }
            })
        })
    </script>
@endsection
