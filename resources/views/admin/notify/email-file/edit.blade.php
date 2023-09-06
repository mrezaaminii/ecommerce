@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش فایل اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش فایل اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش فایل اطلاعیه ایمیلی</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.notify.email-file.index',$file->email->id)}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.notify.email-file.update',$file->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="file">فایل</label>
                                    <input type="file" class="form-control form-control-sm" name="file" id="file" value="{{old('file')}}">
                                </div>
                                @error('file')
                                <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status',$file->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status',$file->status) == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 mt-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
