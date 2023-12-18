@extends('front.layouts.master')
@section('contact')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">تفاصيل المنتج</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{route('home')}}"><i class="lni lni-home"></i> الرئيسيه</a>
                        </li>
                        <li><a href="index.html">المنتجات</a></li>
                        <li>تفاصيل المنتج</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img
                                        src="{{asset('dash/product/'.$data->photo)}}"
                                        id="current"
                                        alt="#"/>
                                </div>

                                <div class="images">
                                    @foreach($data->ProductImages as $row)
                                        <img src="{{asset('dash/ItemsProduct/'.$row->image)}}" class="img" alt="#"/>

                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$data->name}}</h2>
                            <p class="category">
                                <i class="lni lni-tag"></i> Drones:<a
                                    href="javascript:void(0)"
                                >Action cameras</a
                                >
                            </p>
                            <h3 class="price">{{$data->price}} AED<span>{{$data->price_to}} AED</span></h3>
                            <p class="info-text">
                                {!! $data->notes !!}
                            </p>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">الكميه</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button cart-button">
                                            @if(Cart::instance('shopping')->content()->where('id',$data->id)->first())
                                                <form action="{{route('DeletedCart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="cart_id"
                                                           value="{{Cart::content()->where('id',$data->id)->first()->rowId}}">
                                                    <button class="btn btn-danger" style="width: 100%">حذف للسلة
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{route('addToCart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$data->id}}">
                                                    <button class="btn" style="width: 100%">اضافة للسلة</button>
                                                </form>
                                            @endif


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wish-button">
                                            @if(Cart::instance('wishlist')->content()->where('id',$data->id)->first())
                                                <form action="{{route('DeletedCartWishlist')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="cart_id"
                                                           value="{{Cart::content()->where('id',$data->id)->first()->rowId}}">
                                                    <button class="btn">
                                                        <i class="lni lni-heart"></i> حذف من المفضله
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{route('addToWishlist')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$data->id}}">
                                                    <button class="btn">
                                                        <i class="lni lni-heart"></i> اضافة للمفضله
                                                    </button>
                                                </form>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>التفاصيل</h4>
                                <p>
                                    {!! $data->info !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach((img) => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach((img) => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>
@endsection
