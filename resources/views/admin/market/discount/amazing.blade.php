@extends('admin.layouts.master')

@php
use App\Helpers\helper;
@endphp
@section('head-tag')
    <title>فروش شگفت انگیز</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>فروش شگفت انگیز</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.discount.amazingSale.create')}}" class="btn btn-info">افزودن کالا به لیست فروش شگفت انگیز</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th>درصد تخفیف</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amazingSales as $amazingSale)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$amazingSale->product->name}}</td>
                            <td>{{$amazingSale->percentage}}</td>
                            <td>{{helper::jalaliDate($amazingSale->start_date,'H:i:s Y-m-d')}}</td>
                            <td>{{helper::jalaliDate($amazingSale->end_date,'H:i:s Y-m-d')}}</td>
                            <td class="text-left width-16-rem">
                                <a href="{{route('admin.market.discount.amazingSale.edit',$amazingSale->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{route('admin.market.discount.amazingSale.destroy',$amazingSale->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-alt"></i> حذف</button>
                                </form>
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

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm',['className' => 'delete'])
@endsection

