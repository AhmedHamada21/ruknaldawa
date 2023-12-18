@extends('front.layouts.master')
@section('css')

@endsection
@section('contact')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">قائمة المنتجات</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{route('home')}}"><i class="lni lni-home"></i> الرئيسيه</a>
                        </li>
                        <li>قائمة المنتجات</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>بحث عن المنتج</h3>
                            <form action="#">
                                <input type="text" placeholder="ابحث هنا..." />
                                <button type="submit">
                                    <i class="lni lni-search-alt"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>كل الاقسام</h3>
                            <ul class="list">
                                @foreach(App\Models\Category::all() as $row)
                                    <li>
                                        <a href="product-grids.html">{{$row->name}}</a>
                                        <span>({{$row->products_count}})</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->

                        <!-- End Single Widget -->
                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting"> ترتيب حسب:</label>
                                        <select class="form-control" id="sorting">
                                            <option value="">القسم</option>
                                            <option value="">القسم</option>
                                            <option value="">القسم</option>
                                            <option value="">القسم</option>
                                            <option value="">القسم</option>
                                        </select>
                                        <h3 class="total-show-product">
                                            عرض: <span>1 - 12 منتج</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button
                                                class="nav-link active"
                                                id="nav-grid-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-grid"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-grid"
                                                aria-selected="true"
                                            >
                                                <i class="lni lni-grid-alt"></i>
                                            </button>
                                            <button
                                                class="nav-link"
                                                id="nav-list-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-list"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-list"
                                                aria-selected="false"
                                            >
                                                <i class="lni lni-list"></i>
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="nav-grid"
                                role="tabpanel"
                                aria-labelledby="nav-grid-tab"
                            >
                                <div class="row">
                                    @foreach(getProducts() as $product)

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <img src="{{asset('dash/product/'.$product->photo)}}" alt="#" />
                                                    <div class="button">
                                                        @if(Cart::instance('shopping')->content()->where('id',$product->id)->first())
                                                            <form action="{{route('DeletedCart')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="cart_id" value="{{Cart::content()->where('id',$product->id)->first()->rowId}}">
                                                                <button class="btn btn-danger"><i class="lni lni-cart"></i>حذف للسلة</button>
                                                            </form>
                                                        @else
                                                            <form action="{{route('addToCart')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                <button class="btn"><i class="lni lni-cart"></i>اضافة للسلة</button>
                                                            </form>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <span class="category">{{$product->category->name}}</span>
                                                    <h4 class="title">
                                                        <a href="{{route('product_show',$product->id)}}">
                                                            {{$product->name}}
                                                        </a>
                                                    </h4>
                                                    <div class="price">
                                                        <span>${{$product->price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
@endsection


@section('js')
    <!-- ========================= JS here ========================= -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"

    ></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
@endsection
