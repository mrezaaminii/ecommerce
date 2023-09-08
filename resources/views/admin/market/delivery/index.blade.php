@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش های ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>روش های ارسال</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.delivery.create')}}" class="btn btn-info">ایجاد روش ارسال جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام روش ارسال</th>
                            <th>هزینه ارسال</th>
                            <th>زمان ارسال</th>
                            <th>وضعیت</th>
                            <th class="width-11-rem text-right"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($delivery_methods as $key => $delivery_method)
                        <tr>
                            <th>{{$key += 1}}</th>
                            <td>{{$delivery_method->name}}</td>
                            <td>{{$delivery_method->amount}} تومان</td>
                            <td>{{$delivery_method->fullDay}}</td>
                            <td>
                                <label for="{{$delivery_method->id}}">
                                    <input id="{{$delivery_method->id}}" onchange="changeStatus({{$delivery_method->id}})" data-url="{{route('admin.market.delivery.status',$delivery_method->id)}}" type="checkbox" @if($delivery_method->status === 1) checked

                                        @endif>
                                </label>
                            </td>
                            <td class="text-left width-11-rem">
                                <a href="{{route('admin.market.delivery.edit',$delivery_method->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{route('admin.market.delivery.destroy',$delivery_method->id)}}" method="POST" id="deleteForm">
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
                            successToast('روش ارسال با موفقیت فعال شد');
                        }
                        else{
                            element.prop('checked',false);
                            successToast('روش ارسال با موفقیت غیر فعال شد');
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

