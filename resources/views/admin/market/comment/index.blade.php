@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>نظرات</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info disabled"info>ایجاد نظر جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نویسنده نظر</th>
                            <th>کد کاربر</th>
                            <th>کد کالا</th>
                            <th>کالا</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1</th>
                            <td>4763874</td>
                            <td>سهیل کاشانی</td>
                            <td>3878646</td>
                            <td>شارژر type C</td>
                            <td>در انتظار تایید</td>
                            <td class="text-left width-16-rem">
                                <a href="{{route('admin.market.comment.show')}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تایید</button>
                            </td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>4763874</td>
                            <td>سهیل کاشانی</td>
                            <td>3878646</td>
                            <td>شارژر type C</td>
                            <td>تایید شده</td>
                            <td class="text-left width-16-rem">
                                <a href="{{route('admin.market.comment.show')}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-clock"></i> عدم تایید</button>
                            </td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>4763874</td>
                            <td>سهیل کاشانی</td>
                            <td>3878646</td>
                            <td>شارژر type C</td>
                            <td>در انتظار تایید</td>
                            <td class="text-left width-16-rem">
                                <a href="{{route('admin.market.comment.show')}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تایید</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

