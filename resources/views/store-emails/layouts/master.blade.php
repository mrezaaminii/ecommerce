<!doctype html>
<html lang="fa" dir="rtl">
<head>

    @include('store-emails.layouts.head-tag')
    @yield('head-tag')

</head>
<body>

    @include('store-emails.layouts.header')

    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('store-emails.layouts.footer')

</body>
</html>
