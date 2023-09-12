@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کوپن تخفیف</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد کوپن تخفیف</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.discount.copan')}}" class="btn btn-info">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.discount.copan.store')}}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کد کوپن</label>
                                    <input type="text" class="form-control form-control-sm" name="code" value="{{old('code')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('code')
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
                                    <label for="">نوع کوپن</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if(old('type') == 0) @endif>عمومی</option>
                                        <option value="1" @if(old('type') == 1) @endif>خصوصی</option>
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
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کاربران</label>
                                    <select name="user_id" id="users" class="form-control form-control-sm" disabled>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" @if(old('user_id') == $user->id) selected @endif>{{$user->fullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('user_id')
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
                                    <label for="">میزان تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="amount" value="{{old('amount')}}">
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
                                    <label for="">نوع تخفیف</label>
                                    <select name="amount_type" id="amount_type" class="form-control form-control-sm">
                                        <option value="0" @if(old('amount_type') == 0) @endif>درصدی</option>
                                        <option value="1" @if(old('amount_type') == 1) @endif>عددی</option>
                                    </select>
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('amount_type')
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
                                    <label for="">حداکثر تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="discount_ceiling" value="{{old('discount_ceiling')}}">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('discount_ceiling')
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
                                    <label for="">تاریخ شروع</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="start_date" id="start_date">
                                    <input type="text" class="form-control form-control-sm" id="start_date_view">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('start_date')
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
                                    <label for="">تاریخ پایان</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="end_date" id="end_date">
                                    <input type="text" class="form-control form-control-sm" id="end_date_view">
                                </div>
                                <div class="mt-2 mb-2">
                                    @error('end_date')
                                    <span class="alert-danger text-white rounded p-1" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12">
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
    <script>
        $('#type').change(function () {
            if ($('#type').find(':selected').val() == 1){
                $('#users').removeAttr('disabled');
            }else{
                $('#users').attr('disabled','disabled');
            }
        })

    </script>
        <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
        <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('#start_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#start_date',
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                        }
                    }
                })
                $('#end_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date',
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                        }
                    }
                })


            });
        </script>

@endsection
