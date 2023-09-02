@extends('admin.layouts.master')

@section('head-tag')
    <title> تخفیف عمومی</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>کوپن تخفیف</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.discount.commonDiscount.create')}}" class="btn btn-info">ایجاد کوپن تخفیف</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>درصد تخفیف</th>
                            <th>سقف تخفیف</th>
                            <th>عنوان مناسبت</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1</th>

                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>دهه مبارک فجر</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>

                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>دهه مبارک فجر</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>

                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>دهه مبارک فجر</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection


