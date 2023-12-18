<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-12">
                    <div class="text-center text-white">
                        توصيل مجاني للطلبات أكثر من 100 ريال
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="top-end text-center">
                        <!-- I'm a member -->
                        @auth
                            <div class="member">
                                <i class="lni lni-user xc"></i>
                                <p class="welcome">مرحباً بك</p>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                       تسجيل الخروج
                                    </x-dropdown-link>
                                </form>

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth::user()->name}}
                                        <i class="lni lni-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('account-dashboard')}}">
                                            <i class="lni lni-user"></i>
                                            معلوماتى
                                        </a>
                                        <a class="dropdown-item" href="{{route('getOrders')}}">
                                            <i class="lni lni-restaurant"></i>
                                            Orders
                                        </a>



                                    </div>
                                </div>
                            </div>
                        @else
                            <ul class="user-login">
                                <li>
                                    <a href="{{route('login')}}">تسجيل الدخول</a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}">انشاء حساب</a>
                                </li>
                            </ul>
                        @endauth


                        <!-- I'm not member  -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 col-lg-4 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{route('home')}}">
                        <!-- <img src="assets/images/logo/logo.svg" alt="Logo" /> -->
                        <h3>الركن الدوائي</h3>
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-4 col-md-4 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input type="text" placeholder=" بحث ......"/>
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-sm-6 col-lg-4 col-md-5 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <h3>
                                الهاتف
                                <span style="direction: ltr">{{getInformation()->phone}}</span>
                            </h3>
                            <i class="lni lni-phone"></i>
                        </div>
                        <div class="navbar-cart">


                            <div class="wishlist">
                                @foreach (Cart::instance('wishlist')->content() as $row)
                                    <a href="#">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">{{ Cart::instance('wishlist')->count() }}</span>
                                    </a>
                                @endforeach
                            </div>


                            <div class="cart-items">

                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ Cart::instance('shopping')->count() }}</span>
                                </a>
                                <!-- Shopping Item -->
                                @foreach (Cart::instance('shopping')->content() as $row)
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>{{ Cart::instance('shopping')->count() }} منتج</span>
                                        </div>
                                        <ul class="shopping-list">
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="{{route('product_show',$row->id)}}"><img
                                                            src="{{asset('dash/product/'.\App\Models\Product::where('id',$row->id)->first()->photo)}}"
                                                            alt="#"/></a>
                                                </div>

                                                <div class="content">
                                                    <h4>
                                                        <a href="{{route('product_show',$row->id)}}">
                                                            {{\App\Models\Product::where('id',$row->id)->first()->name}}
                                                        </a>
                                                    </h4>
                                                    <p class="quantity">
                                                        1x - <span class="amount">{{$row->price}}</span>
                                                    </p>
                                                </div>
                                            </li>

                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span class="total-amount">{{ Cart::subtotal() }}</span>
                                                <span>السعر الكلي</span>
                                            </div>
                                            <div class="button">
                                                <a href="{{route('checkoutDetails')}}" class="btn animate"> الدفع</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--/ End Shopping Item -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>كل الاقسام</span>
                        <ul class="sub-category">
                            @foreach(getCategory() as $row)
                                <li><a href="product-grids.html">{{$row->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('home')}}" aria-label="Toggle navigation">الرئيسيه</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('product')}}" aria-label="Toggle navigation">التسوق</a>
                                </li>


                                <li class="nav-item">
                                    <a href="cart.html" aria-label="Toggle navigation">السله</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('aboutUsFor')}}" aria-label="Toggle navigation">عنا</a>
                                </li>
                                <li class="nav-item">
                                    <!-- class="active" -->
                                    <a href="{{route('contact-us')}}" aria-label="Toggle navigation">تواصل معنا</a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">تابعنا :</h5>
                    <ul>
                        <li>
                            <a href=""><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>
<!-- End Header Area -->
