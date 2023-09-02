@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد کالا</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.product.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="#" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">دسته کالا</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="" disabled selected>دسته را انتخاب کنید</option>
                                        <option value="">وسایل الکترونیکی</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">فرم کالا</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="" disabled selected>دسته را انتخاب کنید</option>
                                        <option value="">وسایل الکترونیکی</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input type="file" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="body" id="body" rows="10" class="form-control form-control-sm"></textarea>
                                </div>
                            </section>
                            <section class="col-12 border-top border-bottom py-3 mb-3">
                            <div class="row">
                            <section class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="ویژگی...">
                                </div>
                            </section>
                                <section class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="مقدار...">
                                </div>
                                </section>
                            </div>
                                <section>
                                    <button type="button" class="btn btn-success btn-sm">افزودن</button>
                                </section>
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection


@section('script')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
