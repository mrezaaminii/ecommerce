@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش نظر</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> نظرها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>نمایش نظر</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.content.comment.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section class="card mb-3">
                    <section class="card-header text-white bg-custom-yellow">
                        {{$comment->user->fullName}} - {{$comment->author_id}}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">مشخصات کالا : {{$comment->commentable->title}} کد کالا : {{$comment->commentable->id}}</h5>
                        <p class="card-text">{{$comment->body}}</p>
                    </section>
                </section>
                @if($comment->parent_id == null)
                <section>
                    <form action="{{route('admin.content.comment.answer',$comment->id)}}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین</label>
                                    <textarea name="body" id="" rows="4" class="form-control form-control-sm"></textarea>
                                </div>
                                @error('body')
                                <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
                @endif
            </section>
        </section>
    </section>
@endsection


