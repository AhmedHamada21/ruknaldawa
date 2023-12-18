<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body class="theme-indigo rtl" style="font-family: 'Cairo', sans-serif;">

<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('dash/assets/images/brand/icon_black.svg')}}" width="48" height="48" alt="ArrOw"></div>
        <p>جاري تحميل البيانات ...</p>
    </div>
</div>


@include('admin.layouts.nav')

<div class="main_content" id="main-content">
    @include('admin.layouts.left_sidebar')

    <div class="page">
        @yield('navbar')
        @yield('contact')
    </div>

</div>
@include('admin.layouts.footerjs')



</body>
</html>
