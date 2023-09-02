@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه </a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پست ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>پست ها</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.content.post.create')}}" class="btn btn-info">ایجاد پست جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو" class="form-text form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان پست</th>
                            <th>دسته</th>
                            <th>تصویر</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <th>{{$key += 1}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->postCategory->name}}</td>
                            <td>
{{--                                <img src="{{asset($postCategory->image['indexArray'][$postCategory->image['currentImage']])}}" alt="" width="40" height="40">--}}
                            </td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <th>2</th>
                            <td>ایلان ماسک کیست؟</td>
                            <td>دنیای فناوری</td>
                            <td><img src="{{asset('admin-assets/images/avatar-2.jpg')}}" alt="" class="max-height-2-rem"></td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>چگونه ویندوز لپ تاپ را عوض کنیم؟</td>
                            <td>کالای الکترونیکی</td>
                            <td><img src="{{asset('admin-assets/images/avatar-2.jpg')}}" alt="" class="max-height-2-rem"></td>
                            <td class="text-left width-16-rem">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>حذف </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

