@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش انبار</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> انبار</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش انبار</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.store.index')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.store.update',$product->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="marketable_number">تعداد موجود در انبار</label>
                                    <input type="text" class="form-control form-control-sm" name="marketable_number" value="{{old('marketable_number',$product->marketable_number)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('marketable_number')
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
                                    <label for="frozen_number">تعداد رزرو شده</label>
                                    <input type="text" class="form-control form-control-sm" name="frozen_number" value="{{old('frozen_number',$product->frozen_number)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('frozen_number')
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
                                    <label for="sold_number">تعداد فروخته شده</label>
                                    <input type="text" class="form-control form-control-sm" name="sold_number" value="{{old('sold_number',$product->sold_number)}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('sold_number')
                                    <span class="alert-danger text-white rounded p-1">
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

