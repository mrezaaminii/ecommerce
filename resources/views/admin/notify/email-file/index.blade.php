@extends('admin.layouts.master')

@php
    use App\Helpers\helper;
@endphp
@section('head-tag')
    <title>فایل های اطلاعیه ایمیلی</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12" aria-current="page"> اطلاعیه ایمیلی</li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> فایل های اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>فایل های اطلاعیه ایمیلی</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.notify.email-file.create',$email->id)}}" class="btn btn-info">ایجاد فایل اطلاعیه ایمیلی</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان ایمیل</th>
                                <th>سایز فایل</th>
                                <th>نوع فایل</th>
                                <th>وضعیت</th>
                                <th class="text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($email->files as $key => $file)
                            <tr>
                                <th>{{$key += 1}}</th>
                                <td>{{$email->subject}}</td>
                                <td>{{$file->file_size}}</td>
                                <td>{{$file->file_type}}</td>
                                <td>
                                    <label for="{{$file->id}}">
                                        <input type="checkbox" data-url="{{route('admin.notify.email-file.status',$file->id)}}" id="{{$file->id}}" onchange="changeStatus({{$file->id}})" @if($file->status == 1) checked @endif>
                                    </label>
                                </td>
                                <td class="text-left">
                                    <a href="{{route('admin.notify.email-file.edit',$file->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form action="{{route('admin.notify.email-file.destroy',$file->id)}}" method="POST" class="d-inline">
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
    <script type="text/javascript">
        function changeStatus(id){
            var element = $('#' + id);
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status){
                        if (response.checked){
                            element.prop('checked',true);
                            successToast('ایمیل با موفقیت فعال شد');
                        }
                        else{
                            element.prop('checked',false);
                            successToast('ایمیل با موفقیت غیر فعال شد');
                        }
                    }
                    else{
                        element.prop('checked',elementValue);
                        errorToast('هنگام ویرایش مشکلی پیش آمده است');
                    }
                },
                error: function () {
                    element.prop('checked',elementValue);
                    errorToast('ارتباط برقرار نشد');
                }
            });
            function successToast(message){
                var successToastTag = '<div class="toast" data-delay="5000">\n' +
                    '<div class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">\n' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' + '</button>\n' + '</div>\n' + '</div>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }
            function errorToast(message){
                var errorToastTag = '<div class="toast" data-delay="5000">\n' +
                    '<div class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">\n' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' + '</button>\n' + '</div>\n' + '</div>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }
        }
    </script>
    @include('admin.alerts.sweetalert.delete-confirm',['className' => 'delete'])
@endsection
