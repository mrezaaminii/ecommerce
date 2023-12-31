@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>تنظیمات</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info disabled">ایجاد تنظیمات جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان سایت</th>
                                <th>توضیحات سایت</th>
                                <th>کلمات کلیدی سایت</th>
                                <th>لوگو سایت</th>
                                <th>آیکون سایت</th>
                                <th class="width-11-rem text-right"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>{{$setting->title}}</td>
                                <td>{{$setting->description}}</td>
                                <td>{{$setting->keywords}}</td>
                                <td>
                                    <img src="{{asset($setting->logo)}}" alt="" width="40" height="40">
                                </td>
                                <td>
                                    <img src="{{asset($setting->icon)}}" alt="" width="40" height="40">
                                </td>
                                <td class="text-left width-11-rem">
                                    <a href="{{route('admin.setting.edit',$setting->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button disabled type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
