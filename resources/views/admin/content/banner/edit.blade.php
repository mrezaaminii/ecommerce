@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش بنر</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بنرها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش بنر</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش بنر</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.content.banner.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.content.banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان بنر</label>
                                    <input type="text" class="form-control form-control-sm" name="title" value="{{old('title',$banner->title)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('title')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('image')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                                <section class="row">
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach($banner->image['indexArray'] as $key => $value)
                                        <section class="col-md-{{6 / $number}}">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="{{$key}}" name="currentImage" id="{{$number}}" @if($banner->image['currentImage'] == $key) checked @endif>
                                                <label for="{{$number}}" class="form-check-label">
                                                    <img src="{{asset($value)}}" alt="" class="w-100">
                                                </label>
                                            </div>
                                        </section>
                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach
                                </section>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status',$banner->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status',$banner->status) == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('status')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">آدرس url</label>
                                    <input type="text" class="form-control form-control-sm" name="url" value="{{old('url',$banner->url)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('url')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">موقعیت</label>
                                    <input type="text" class="form-control form-control-sm" name="position" value="{{old('position',$banner->position)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('position')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
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


