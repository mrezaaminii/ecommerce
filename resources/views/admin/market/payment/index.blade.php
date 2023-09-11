@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4> پرداخت ها</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info disabled">پرداخت جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>32457568</td>
                                <td>ملت</td>
                                <td>{{$payment->user->fullName}}</td>
                                <td>{{$payment->status}}</td>
                                <td>@if($payment->type == 0) آنلاین @elseif($payment->type == 1) آفلاین @else در محل @endif</td>
                                <td class="text-left width-22-rem">
                                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> مشاهده</a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-close"></i> باطل کردن</a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
