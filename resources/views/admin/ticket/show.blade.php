@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش تیکت ها</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش تیکت</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> تیکت</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>نمایش تیکت ها</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.ticket.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section class="card mb-3">
                    <section class="card-header text-white bg-primary">
                        سهیل کاشانی - 845362736
                    </section>
                    <section class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                    </section>
                </section>
                <section>
                    <form action="#" method="" enctype="multipart/form-data">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ تیکت</label>
                                    <textarea name="" id="" rows="4" class="form-control form-control-sm"></textarea>
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


