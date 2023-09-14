<!doctype html>
<html lang="en">
<head>
    @yield('head-tag')
</head>
<body>
@include('customer.layouts.header')
<main id="main-body-one-col" class="main-body">
    @yield('content')
</main>
@include('customer.layouts.script')
@yield('script')
</body>
</html>
