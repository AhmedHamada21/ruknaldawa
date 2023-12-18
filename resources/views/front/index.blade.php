@extends('front.layouts.master')
@section('contact')
    <!-- Start Hero Area -->
    <section class="hero-area" style="direction: ltr">
        <div class="container">
            <div class="row">
                <div class="col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            @foreach(getSliders() as $row)
                                <div class="single-slider" style=" background-image: url('{{asset('dash/slider/'.$row->photo)}}');"></div>
                            @endforeach
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>اشهر المنتجات</h2>
                        <p>
                            هناك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، لكن الأغلبية
                            تم تعديلها بشكل ما.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(getProducts8() as $row)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{asset('front/assets/images/products/p1.jpg')}}" alt="#" />
                                <div class="button">

                                    @if(Cart::instance('shopping')->content()->where('id',$row->id)->first())
                                        <form action="{{route('DeletedCart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{Cart::content()->where('id',$row->id)->first()->rowId}}">
                                            <button class="btn btn-danger"><i class="lni lni-cart"></i>حذف للسلة</button>
                                        </form>
                                    @else
                                        <form action="{{route('addToCart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$row->id}}">
                                            <button class="btn"><i class="lni lni-cart"></i>اضافة للسلة</button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{$row->category->name}}</span>
                                <h4 class="title">
                                    <a href="{{route('product_show',$row->id)}}">{{$row->name}}</a>
                                </h4>
{{--                                <ul class="review">--}}
{{--                                    <li><i class="lni lni-star-filled"></i></li>--}}
{{--                                    <li><i class="lni lni-star-filled"></i></li>--}}
{{--                                    <li><i class="lni lni-star-filled"></i></li>--}}
{{--                                    <li><i class="lni lni-star-filled"></i></li>--}}
{{--                                    <li><i class="lni lni-star"></i></li>--}}
{{--                                    <li><span>4.0 Review(s)</span></li>--}}
{{--                                </ul>--}}
                                <div class="price">
                                    <span>{{$row->price}} AED</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Brands Area -->
    <div class="brands" style="direction: ltr">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">الاصناف</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                   @foreach(getSliders() as $row)
                        <div class="brand-logo">
                            <img src="{{asset('dash/slider/'.$row->photo)}}" width="220px" height="160px" alt="#" />
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>ًالشحن مجانا</h5>
                        <span> للطلبات التي تزيد عن 100 دولارًا</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>دعم 24/7.</h5>
                        <span> الدردشة الحية أو الاتصال.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>الدفع الالكتروني</h5>
                        <span> خدمات الدفع الآمنة.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>سهولة العودة.</h5>
                        <span>تسوق خالي من المتاعب.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
@endsection

@section('js')
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: ".hero-slider",
            slideBy: "page",
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: [
                '<i class="lni lni-chevron-left"></i>',
                '<i class="lni lni-chevron-right"></i>',
            ],
        });

        //======== Brand Slider
        tns({
            container: ".brands-logo-carousel",
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                },
            },
        });
    </script>

    <script src="{{asset('front/assets/js/slim.min.js')}}"></script>
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap1.min.js')}}"></script>

    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>

@endsection
