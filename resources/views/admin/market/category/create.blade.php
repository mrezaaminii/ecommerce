@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> دسته بندی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد دسته بندی</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.category.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.category.store')}}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام دسته</label>
                                    <input type="text" class="form-control form-control-sm" name="name" value="{{old('name')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                @error('name')
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
                                    <label for="">دسته والد</label>
                                    <select name="parent_id" id="" class="form-control form-control-sm">
                                        <option disabled selected>دسته را انتخاب کنید</option>
                                        @foreach($productCategories as $productCategory)
                                        <option value="{{$productCategory->id}}" @if(old('parent_id' == $productCategory->id)) selected @endif>{{$productCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('parent_id')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
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
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
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
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">نمایش در منو</label>
                                    <select name="show_in_menu" id="show_in_menu" class="form-control form-control-sm">
                                        <option value="0" @if(old('show_in_menu') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('show_in_menu') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                @error('show_in_menu')
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
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags" value="{{old('tags')}}">
                                    <select name="select_tags" id="select_tags" class="select2 form-control form-control-sm" multiple>

                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                @error('tags')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                                </div>
                            </section>
                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description" id="description" rows="10" class="form-control form-control-sm">
                                        {{old('description')}}
                                    </textarea>
                                </div>
                                <div class="mt-2 mb-2">
                                @error('description')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                                </div>
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
        CKEDITOR.replace('description');
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

            $('#form').submit(function () {
                if (select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>
@endsection

