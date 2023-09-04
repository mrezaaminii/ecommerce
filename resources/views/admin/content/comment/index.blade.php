@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>نظرات</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info disabled">ایجاد نظر جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نظر</th>
                            <th>پاسخ به</th>
                            <th>کد کاربر</th>
                            <th>نویسنده نظر</th>
                            <th>کد پست</th>
                            <th>پست</th>
                            <th>وضعیت تایید</th>
                            <th>وضعیت کامنت</th>
                            <th class="width-14-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key => $comment)
                        <tr>
                            <th>{{$key += 1}}</th>
                            <th>{{Str::limit($comment->body,10)}}</th>
                            <th>{{$comment->parent_id ? Str::limit($comment->parent->body,10) : ''}}</th>
                            <td>{{$comment->author_id}}</td>
                            <td>{{$comment->user->fullName}}</td>
                            <td>{{$comment->commentable_id}}</td>
                            <td>{{$comment->commentable->title}}</td>
                            <td>{{$comment->approved == 0 ? 'تایید نشده' : 'تایید شده'}}</td>
                            <td>
                                <label for="">
                                    <input type="checkbox" id="{{$comment->id}}" data-url="{{route('admin.content.comment.status',$comment->id)}}" onchange="changeStatus({{$comment->id}})" @if($comment->status == 1) checked @endif>
                                </label>
                            </td>
                            <td class="text-left width-14-rem">
                                <a href="{{route('admin.content.comment.show',$comment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                @if($comment->approved == 1)
                                <a href="{{route('admin.content.comment.approved',$comment->id)}}" type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تایید</a>
                                @else
                                <a href="{{route('admin.content.comment.approved',$comment->id)}}" type="submit" class="btn btn-warning btn-sm"><i class="fa fa-clock"></i> عدم تایید</a>
                                @endif
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
                            successToast('نظر با موفقیت فعال شد');
                        }
                        else{
                            element.prop('checked',false);
                            successToast('نظر با موفقیت غیر فعال شد');
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
@endsection
