@extends('admin.layouts.master')

@section('head-tag')
    <title>کالاها</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالاها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>کالاها</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.product.create')}}" class="btn btn-info">ایجاد کالای جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>قیمت</th>
                                <th>وزن</th>
                                <th>دسته</th>
                                <th>فرم</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>گلکسی S20</td>
                                <td><img src="{{asset('admin-assets/images/avatar-2.jpg')}}" class="max-height-2-rem" alt=""></td>
                                <td>30,000 تومان</td>
                                <td>1 کیلو</td>
                                <td>کالا الکترونیکی</td>
                                <td>اندازه نمایشگر</td>
                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i> گالری</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> فرم کالا</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                            <form action="" method="POST">
                                                <button type="submit" class="dropdown-item text-right"><i class="fa fa-window-close"></i> حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>گلکسی S20</td>
                                <td><img src="{{asset('admin-assets/images/avatar-2.jpg')}}" class="max-height-2-rem" alt=""></td>
                                <td>30,000 تومان</td>
                                <td>1 کیلو</td>
                                <td>کالا الکترونیکی</td>
                                <td>اندازه نمایشگر</td>
                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i> گالری</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> فرم کالا</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                            <form action="" method="POST">
                                                <button type="submit" class="dropdown-item text-right"><i class="fa fa-window-close"></i> حذف</button>
                                            </form>
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
