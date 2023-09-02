@extends('admin.layouts.master')

@section('head-tag')
    <title>برند</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سفارشات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>سفارشات</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info disabled">ایجاد سفارش جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مبلغ سفارش</th>
                                <th>مبلغ تخفیف</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>2425364558</td>
                                <td>290,000 تومان</td>
                                <td>30,000 تومان</td>
                                <td>260,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>سامان</td>
                                <td>در حال ارسال</td>
                                <td>پیک موتوری</td>
                                <td>در حال ارسال</td>

                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>2425364558</td>
                                <td>290,000 تومان</td>
                                <td>30,000 تومان</td>
                                <td>260,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>سامان</td>
                                <td>در حال ارسال</td>
                                <td>پیک موتوری</td>
                                <td>در حال ارسال</td>

                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>2425364558</td>
                                <td>290,000 تومان</td>
                                <td>30,000 تومان</td>
                                <td>260,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>سامان</td>
                                <td>در حال ارسال</td>
                                <td>پیک موتوری</td>
                                <td>در حال ارسال</td>

                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
