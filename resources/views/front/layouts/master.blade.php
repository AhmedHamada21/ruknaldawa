<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.head')
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

@include('front.layouts.header')
@yield('contact')
@include('front.layouts.footer')
@yield('js')
</body>
</html>
