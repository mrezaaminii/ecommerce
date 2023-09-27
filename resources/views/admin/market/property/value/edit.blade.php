@extends('admin.layouts.master')

@php
    use App\Models\Admin\Market\Product;
@endphp
@section('head-tag')
    <title>ویرایش فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش مقدار فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش مقدار فرم کالا
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.value.index',$categoryAttribute->id) }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.value.update',['categoryAttribute' => $categoryAttribute->id,'value' => $value->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب محصول</label>
                                    <select name="product_id" id="" class="form-control form-control-sm">
                                        <option value="">محصول را انتخاب کنید</option>
{{--                                        @foreach ($categoryAttribute->category->products as $product)--}}
                                            @foreach( $products = Product::all() as $product )
                                                <option value="{{ $product->id }}" @if(old('product_id',$value->product_id) == $product->id) selected @endif>{{ $product->name }}</option>
                                            @endforeach
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                @error('product_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">مقدار</label>
                                    <input type="text" name="value" value="{{old('value',json_decode($value->value)->value)}}" class="form-control form-control-sm">
                                </div>
                                @error('value')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">افزایش قیمت</label>
                                    <input type="text" name="price_increase" value="{{ old('price_increase',json_decode($value->value)->price_increase) }}" class="form-control form-control-sm">
                                </div>
                                @error('price_increase')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">نوع</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if(old('type',$value->type) == 0) selected @endif>ساده</option>
                                        <option value="1" @if(old('type',$value->type) == 1) selected @endif>انتخابی</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('type')
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
