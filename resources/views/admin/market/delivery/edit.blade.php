@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش روش ارسال</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> روش های ارسال</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش روش ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش روش ارسال</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.delivery.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.delivery.update',$delivery->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="name" value="{{old('name',$delivery->name)}}">
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
                                    <label for="">هزینه روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="amount" value="{{old('amount',$delivery->amount)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('amount')
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
                                    <label for="">زمان ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="delivery_time" value="{{old('delivery_time',$delivery->delivery_time)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('delivery_time')
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
                                    <label for="">واحد زمان ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="delivery_time_unit" value="{{old('delivery_time_unit',$delivery->delivery_time_unit)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('delivery_time_unit')
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



