@extends('admin.layouts.master')

@section('head-tag')
    <title>بنرها</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> بنرها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>بنرها</h4>
                </section>
                @include('admin.alerts.alert-section.success')

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.content.banner.create')}}" class="btn btn-info">ایجاد بنر</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان بنر</th>
                                <th>آدرس</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>مکان</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $key => $banner)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->url}}</td>
                                <td>
                                    <img src="{{asset($banner->image['indexArray'][$banner->image['currentImage']])}}" alt="" width="40" height="40">
                                </td>
                                <td>
                                    <label for="{{$banner->id}}">
                                        <input id="{{$banner->id}}" onchange="changeStatus({{$banner->id}})" data-url="{{route('admin.content.banner.status',$banner->id)}}" type="checkbox" @if($banner->status === 1) checked

                                        @endif>
                                    </label>
                                </td>
                                <td>{{$banner->position}}</td>
                                <td class="text-left width-16-rem">
                                    <a href="{{route('admin.content.category.edit',$banner->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.content.category.destroy',$banner->id)}}" method="POST" id="deleteForm">
                                        @csrf
                                        {{method_field('delete')}}
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
                            successToast('بنر با موفقیت فعال شد');
                        }
                        else{
                            element.prop('checked',false);
                            successToast('بنر با موفقیت غیر فعال شد');
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
    <script>
        $(document).ready(function () {
            $('#deleteForm').submit(function (event) {
                event.preventDefault();
                // if (confirm('آیا مطمئن هستید که می‌خواهید این رکورد را حذف کنید؟')) {
                //     var previousPage = document.referrer;
                    $.ajax({
                        url: $(this).attr('action'),
                        type: "POST",
                        data: $(this).serialize(),
                        success: function (response) {
                            // console.log(response.message);
                            window.location.href = "{{route('admin.content.category.index')}}";
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                // }
            });
        });
    </script>

@include('admin.alerts.sweetalert.delete-confirm',['className' => 'delete'])

@endsection
