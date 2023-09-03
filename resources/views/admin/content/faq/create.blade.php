@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پرسش</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> پرسش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پرسش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد پرسش</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.content.faq.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.content.faq.store')}}" method="POST" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پرسش</label>
                                    <textarea name="question" id="question" rows="6" class="form-control form-control-sm">
                                        {{old('question')}}
                                    </textarea>
                                </div>
                                @error('question')
                                    <span class="alert-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="">پاسخ</label>
                                    <textarea name="answer" id="answer" rows="6" class="form-control form-control-sm">
                                        {{old('answer')}}
                                    </textarea>
                                </div>
                                @error('answer')
                                <span class="alert-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <input type="hidden" class="form-control form-control-sm" id="tags_input" name="tags" value="{{old('tags')}}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                <span class="alert-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="status"></label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status' == 0)) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status' == 1)) selected @endif>فعال</option>
                                    </select>
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

@section('script')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('answer');
        CKEDITOR.replace('question');
    </script>
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags_input');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;
            if(tags_input.val() !== null && tags_input.val().length > 0){
                default_data = default_tags.split(',')
            }
            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید',
                tags: true,
                data: default_data,
            })
            select_tags.children('option').attr('selected',true).trigger('change');
            $('#form').submit(function () {
                if(select_tags.val() !== null && select_tags.val().length > 0){
                var selectedSource = select_tags.val().join(',');
                tags_input.val(selectedSource);
                }
            })
        })
    </script>
@endsection
