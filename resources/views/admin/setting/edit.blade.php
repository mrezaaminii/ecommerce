@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش تنظیمات</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.setting.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        {{method_field('put')}}
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">عنوان سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="name" value="{{old('title',$setting->title)}}">
                                </div>
                                @error('title')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">توضیحات سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="description" id="description" value="{{old('description',$setting->description)}}">
                                </div>
                                @error('description')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">کلمات کلیدی سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="keywords" id="keywords" value="{{old('keywords',$setting->keywords)}}">
                                </div>
                                @error('keywords')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="logo">لوگو</label>
                                    <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                                </div>
                                @error('logo')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror

                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                                </div>
                                @error('icon')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror

                            </section>
                            <section class="col-12 my-2">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection


