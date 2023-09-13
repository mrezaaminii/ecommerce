<header class="header-main">
    <section class="sidebar-header bg-gray">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
            <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fa fa-toggle-off"></i></span>
            <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fa fa-toggle-on"></i></span>
            <span><img class="logo" src="{{asset('admin-assets/images/logo.png')}}" alt="logo"></span>
            <span class="d-md-none" id="menu-toggle"><i class="fa fa-ellipsis-h"></i></span>
        </section>
    </section>
    <section class="body-header d-md-inline" id="body-header">
        <section class="d-flex justify-content-between">
            <section>
                <span class="mr-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fa fa-times pointer"></i>
                        <input id="search-input" type="text" class="search-input" placeholder="جستجو...">
                        <i class="fa fa-search pointer"></i>
                    </span>
                    <i id="search-toggle" class="fa fa-search px-1 d-md-inline d-none pointer"></i>
                </span>
                <span id="full-screen" class="pointer d-md-inline d-none p-1 mr-5">
                    <i id="screen-compress" class="fa fa-compress d-none"></i>
                    <i id="screen-expand" class="fa fa-expand"></i>
                </span>
            </section>
            <section>
                <span class="ml-2 ml-md-4 position-relative">
                    <span class="pointer" id="header-notification-toggle">
                    <i class="far fa-bell"></i>

                            @if($notifications->count() !== 0)
                            <sup class="badge badge-danger">
                                {{$notifications->count()}}
                            </sup>
                        @endif

                    </span>
                    <section id="header-notification" class="header-notification position-absolute rounded">
                        <section class="d-flex justify-content-between">
                            <span class="px-2">
                                نوتیفیکیشن ها
                            </span>
                            <span class="px-2">
                                <span class="badge badge-danger">جدید</span>
                            </span>
                        </section>
                        <ul class="list-group px-0">
                            @foreach($notifications as $notification)
                                <li class="list-group-item list-group-item-action">
                               <section class="media">
                                   <section class="media-body pr-1">
                                       <p class="notification-time">{{$notification['data']['message']}}</p>
                                   </section>
                               </section>
                           </li>
                            @endforeach
                        </ul>

                    </section>
                </span>
                <span class="ml-2 ml-md-4 position-relative">
                    <span class="pointer" id="header-comment-toggle">
                        <i class="far fa-comment-alt"></i>
                        @if($unSeenComments->count() !== 0)
                            <sup class="badge badge-danger">
                            {{$unSeenComments->count()}}
                            </sup>
                        @endif
                    </span>
                    <section id="header-comment" class="header-comment px-4">
                        <section class="border-bottom">
                            <input type="text" class="form-control form-control-sm my-4" placeholder="جستجو...">
                        </section>
                        <section class="header-comment-wrapper">
                            <ul class="list-group px-0">
                                @foreach($unSeenComments as $unSeenComment)
                                    <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <img src="{{asset($unSeenComment->user->profile_photo_path)}}" alt="avatar" class="notification-img">
                                        <section class="media-body pr-1">
                                            <section class="d-flex justify-content-between">
                                                <h5 class="comment-user">{{$unSeenComment->user->fullName}}</h5>
                                                <span><i class="fa fa-circle text-success comment-user-status"></i></span>
                                            </section>
                                        </section>
                                    </section>
                                </li>
                                @endforeach
                            </ul>
                        </section>
                    </section>
                </span>
                <span class="ml-3 ml-md-5 position-relative">
                    <span class="pointer" id="header-profile-toggle">
                        <img class="header-avatar" src="{{asset('admin-assets/images/avatar-2.jpg')}}" alt="avatar">
                        <span class="header-username">
                            کامران محمدی
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </span>
                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">
                            <a class="list-group-item list-group-item-action header-profile-link" href="#">
                                <i class="fa fa-cog"></i>تنظیمات
                            </a>
                            <a class="list-group-item list-group-item-action header-profile-link" href="#">
                                <i class="fa fa-user"></i>کاربر
                            </a>
                            <a class="list-group-item list-group-item-action header-profile-link" href="#">
                                <i class="fa fa-envelope"></i>پیام ها
                            </a>
                            <a class="list-group-item list-group-item-action header-profile-link" href="#">
                                <i class="fa fa-lock"></i>قفل صفحه
                            </a>
                            <a class="list-group-item list-group-item-action header-profile-link" href="#">
                                <i class="fa fa-sign-out-alt"></i>خروج
                            </a>
                        </section>
                    </section>
                </span>
            </section>
        </section>
    </section>
</header>
