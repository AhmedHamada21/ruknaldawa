<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="{{route('admin')}}">
                    @if (file_exists(public_path('front/assets/newImages/logo.png')))
                        <img src="{{ asset('front/assets/newImages/logo.png') }}" alt="User">
                    @else
                        الركن الدوائي
                @endif

            </div>
            <div class="detail mt-3">
{{--                <h5 class="mb-0">Mike Thomas</h5>--}}
                <small>Admin</small>
            </div>
            <div class="social">
{{--                <a href="javascript:void(0);" title="facebook"><i class="ti-twitter-alt"></i></a>--}}
{{--                <a href="javascript:void(0);" title="twitter"><i class="ti-linkedin"></i></a>--}}
{{--                <a href="javascript:void(0);" title="instagram"><i class="ti-facebook"></i></a>--}}
            </div>
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">مرحبا بك في لوحه التحكم</li>
            <li class="{{request()->routeIs('admin') ? ' active' : null }}"><a href="{{route('admin')}}"><i class="ti-home"></i><span>الصفحه الرئسيه</span></a></li>

            <li class="{{request()->routeIs('setting') ? ' active' : null}}"><a href="{{route('setting')}}"><i class="ti-home"></i><span>الاعدادات الرئسيه</span></a></li>


            <li class="{{request()->routeIs('aboutUs') ? ' active' : null}}"><a href="{{route('aboutUs')}}"><i class="ti-home"></i><span>من نحن</span></a></li>

            <li class="{{request()->routeIs('sliders.index') ? ' active' : null}} ">
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-pie-chart"></i><span>سليدر</span></a>
                <ul>
                    <li><a href="{{route('sliders.index')}}">جميع سليدر</a></li>
                    <li><a href="{{route('sliders.create')}}">اضافه جديده</a></li>
                </ul>
            </li>
            <li {{request()->routeIs('category.index') ? ' active' : null}} >
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-pencil-alt"></i><span>الفئات</span></a>
                <ul>
                    <li><a href="{{route('category.index')}}">جميع الفئات</a></li>
                    <li><a href="{{route('category.create')}}">اضافه جديده</a></li>
                </ul>
            </li>
            <li class="{{request()->routeIs('product.index') ? ' active' : null}}">
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>المنتجات</span></a>
                <ul>
                    <li><a href="{{route('product.index')}}">جميع المنتجات</a></li>
                    <li><a href="{{route('product.create')}}">اضافه جديده</a></li>
                </ul>
            </li>

            <li class="{{request()->routeIs('blogs.index') ? ' active' : null}}">
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>المقالات</span></a>
                <ul>
                    <li><a href="{{route('blogs.index')}}">جميع المقالات</a></li>
                    <li><a href="{{route('blogs.create')}}">اضافه جديده</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>الكلمات المفتاحيه</span></a>
                <ul>
                    <li><a href="table-basic.html">Table Example</a></li>
                    <li><a href="table-normal.html">Table Normal</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>الصور</span></a>
                <ul>
                    <li><a href="table-basic.html">Table Example</a></li>
                    <li><a href="table-normal.html">Table Normal</a></li>
                </ul>
            </li> --}}

            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>الطلبات</span></a>
                <ul>
                    <li><a href="{{ route('order.index') }}">جميع الطلبات</a></li>
                    {{-- <li><a href="table-basic.html">طلبات جديده</a></li> --}}
{{--                    <li><a href="table-basic.html">طلبا</a></li>--}}
{{--                    <li><a href="table-normal.html">Table Normal</a></li>--}}
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>الاعضاء</span></a>
                <ul>
                    <li><a href="{{ route('users') }}">جميع الاعضاء</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-view-list"></i><span>الصفحات</span></a>
                <ul>
                    <li><a href="{{ route('page_update','contact') }}">تواصل معانا</a></li>
                    <li><a href="{{ route('page_update','dervider') }}">التوصيل</a></li>
                    <li><a href="{{ route('page_update','terms') }}">شروط وأحكام الموقع</a></li>
                    <!--<li><a href="{{ route('page_update','Marketing') }}">برنامج التسويق بالعمولة</a></li>-->
                </ul>
            </li>


        </ul>
    </nav>
</div>

