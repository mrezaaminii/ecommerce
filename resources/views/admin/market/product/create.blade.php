@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
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
                    <form action="{{route('admin.market.product.store')}}" method="POST" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" class="form-control form-control-sm" name="name" value="{{old('name')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('name')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="" disabled selected>دسته را انتخاب کنید</option>
                                        @foreach($productCategories as $productCategory)
                                            <option value="{{$productCategory->id}}" @if(old('category_id') == $productCategory->id) selected @endif>{{$productCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                @error('category_id')
                                <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">انتخاب برند</label>
                                    <select name="brand_id" id="category_id" class="form-control form-control-sm">
                                        <option value="" disabled selected>برند را انتخاب کنید</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @if(old('brand_id') == $brand->id) selected @endif>{{$brand->original_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('brand_id')
                                    <span class="alert-danger text-white rounded p-1">
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
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input type="text" class="form-control form-control-sm" name="weight" value="{{old('weight')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('weight')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">طول</label>
                                    <input type="text" class="form-control form-control-sm" name="length" value="{{old('length')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('length')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عرض</label>
                                    <input type="text" class="form-control form-control-sm" name="width" value="{{old('width')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('width')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">ارتفاع</label>
                                    <input type="text" class="form-control form-control-sm" name="height" value="{{old('height')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('height')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input type="text" class="form-control form-control-sm" name="price" value="{{old('price')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('price')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('status')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" id="marketable" class="form-control form-control-sm">
                                        <option value="0" @if(old('marketable') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('marketable') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('marketable')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="published_at" id="published_at">
                                    <input type="text" class="form-control form-control-sm" id="published_at_view">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('published_at')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags" value="{{old('tags')}}">
                                    <select name="select_tags" id="select_tags" class="select2 form-control form-control-sm" multiple>

                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('tags')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="introduction" id="introduction" rows="10" class="form-control form-control-sm">
                                        {{old('introduction')}}
                                    </textarea>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('introduction')
                                    <span class="alert-danger text-white rounded p-1">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
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
    <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags =  tags_input.val();
            var default_data = null;
            if (tags_input.val() !== null && tags_input.val().length > 0){
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید',
                tags: true,
                data: default_data,
            })

            select_tags.children('option').attr('selected',true).trigger('change');

            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>
@endsection
