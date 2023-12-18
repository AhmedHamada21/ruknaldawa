@extends('front.layouts.master')
@section('css')

@endsection
@section('contact')

{{--<!--start breadcrumb-->--}}
{{--<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">--}}
{{--    <div class="container">--}}
{{--        <div class="page-breadcrumb d-flex align-items-center">--}}
{{--            <h3 class="breadcrumb-title pe-3">Checkout</h3>--}}
{{--            <div class="ms-auto">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb mb-0 p-0">--}}
{{--                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a>--}}
{{--                        </li>--}}
{{--                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--end breadcrumb-->--}}
{{--<!--start shop cart-->--}}
{{--<section class="py-4">--}}
{{--    <div class="container">--}}
{{--        <div class="shop-cart">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 col-xl-8">--}}
{{--                    <div class="checkout-details">--}}
{{--                        <div class="card bg-transparent rounded-0 shadow-none">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="steps steps-light">--}}
{{--                                    <a class="step-item active" href="{{ route('shoppingCart') }}">--}}
{{--                                        <div class="step-progress"><span class="step-count">1</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="step-label"><i class='bx bx-cart'></i>Cart</div>--}}
{{--                                    </a>--}}
{{--                                    <a class="step-item active current" href="checkout-details.html">--}}
{{--                                        <div class="step-progress"><span class="step-count">2</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="d-flex align-items-center mb-3">--}}
{{--                                    <!--<div class="">-->--}}
{{--                                    <!--    <img src="{{ asset('front/assets/images/avatars/avatar-1.png') }}" width="90" alt="" class="rounded-circle p-1 border">-->--}}
{{--                                    <!--</div>-->--}}
{{--                                     <div class="ms-2">--}}
{{--                                        <h6 class="mb-0">Jhon Michle</h6>--}}
{{--                                        <p class="mb-0">michle@example.com</p>--}}
{{--                                    </div>--}}
{{--                                     <div class="ms-auto">--}}
{{--                                        <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="border p-3">--}}
{{--                                    <h2 class="h5 mb-0">Shipping Address</h2>--}}
{{--                                    <div class="my-3 border-bottom"></div>--}}
{{--                                    <div class="form-body">--}}
{{--                                        <form class="row g-3" action="{{ route('createNewOrders') }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="form-label">الاسم الاول</label>--}}
{{--                                                <input type="text" name="name" value="{{ auth()->user() ? auth()->user()->name : '' }}"  {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="form-label">اسم العائلة</label>--}}
{{--                                                <input type="text" name="name_1" value="{{ auth()->user() ? auth()->user()->name : '' }}"   {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">--}}
{{--                                            </div>--}}
{{--                                            <!--<div class="col-md-6">-->--}}
{{--                                            <!-- <label class="form-label">البريد الالكتروني</label>-->--}}
{{--                                            <!--    <input type="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}"  {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">-->--}}
{{--                                            <!--</div>-->--}}
{{--                                            <div class="col-md-6">--}}
{{--                                              <label class="form-label">رقم الهاتف </label>--}}
{{--                                                <input type="number" name="phone" value="{{ auth()->user() ? auth()->user()->phone : '' }}" {{ auth()->user() ? '' : 'required' }}  class="form-control rounded-0">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6">--}}
{{--																<label class="form-label">المدينة</label>--}}
{{--																<select class="form-select rounded-0" {{ auth()->user() ? '' : 'required' }} name="governorate">--}}
{{--																<option value="" disabled selected>-اختر من القائمه-</option>--}}
{{--																	<option>ابو ظبى  </option>--}}
{{--																	<option>دبى</option>--}}
{{--																	<option>الشارقة</option>--}}
{{--																	<option>عجمان</option>--}}
{{--																	<option>أم القيوين</option>--}}
{{--																	<option>راس الخيمة</option>--}}
{{--																	<option> الفجيره  </option>--}}
{{--																	<option> خورفكان   </option>--}}
{{--																	<option> دبا  </option>--}}
{{--																	<option> كلباء   </option>--}}
{{--																</select>--}}
{{--															</div>--}}



{{--															 <div class="col-md-6">--}}
{{--                                             	<label class="form-label"> العنوان/ رقم الفيلا او الشقة </label>--}}
{{--                                                <input type="text" name="address" value="{{ auth()->user() ? auth()->user()->address : '' }}" {{ auth()->user() ? '' : 'required' }}  class="form-control rounded-0">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="d-grid">--}}

{{--                                                    <button class="btn btn-dark btn-ecomm"> Checkout<i class='bx bx-chevron-right'></i></button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-xl-4">--}}
{{--                    <div class="order-summary">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <div class="card-body">--}}
{{--                                 <div class="card rounded-0 border bg-transparent shadow-none">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <p class="fs-5">تطبيق كود الخصم</p>--}}
{{--                                        <div class="input-group">--}}
{{--                                            <input type="text" class="form-control rounded-0" placeholder="ادخل رمز الخصم">--}}
{{--                                            <button class="btn btn-dark btn-ecomm" type="button">يتقدم</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card rounded-0 border bg-transparent shadow-none">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <p class="fs-5">ملخص الطلب</p>--}}
{{--                                        <div class="my-3 border-top"></div>--}}
{{--                                        @foreach (Cart::instance('shopping')->content() as $row)--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <a class="d-block flex-shrink-0" href="javascript:;">--}}
{{--                                                <img src="{{asset('dash/product/'.\App\Models\Product::where('id',$row->id)->first()->photo)}}" width="75" alt="Product">--}}
{{--                                            </a>--}}
{{--                                            <div class="ps-2">--}}
{{--                                                <h6 class="mb-1"><a href="javascript:;" class="text-dark">{{ $row->name }}</a></h6>--}}
{{--                                                <div class="widget-product-meta"><span class="me-2">--}}
{{--                                                   {{$row->price}} AED * {{$row->qty}}--}}
{{--                                                    </span>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <p class="mb-2">المجموع الفرعي <span class="float-end">{{ Cart::subtotal() }} AED</span>--}}
{{--                                        </p>--}}

{{--                                        <div class="my-3 border-top"></div>--}}
{{--                                        <h5 class="mb-0">الطلب الكلي <span class="float-end">{{ Cart::subtotal() }} AED</span></h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end row-->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--end shop cart-->--}}


<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">الدفع</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="index.html"><i class="lni lni-home"></i> الرئيسيه</a>
                    </li>
                    <li><a href="index.html">التسوق</a></li>
                    <li>الدفع</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!--====== Checkout Form Steps Part Start ======-->

<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6
                                class="title"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseThree"
                                aria-expanded="true"
                                aria-controls="collapseThree"
                            >
                                البيانات الشخصية
                            </h6>
                            <section
                                class="checkout-steps-form-content collapse show"
                                id="collapseThree"
                                aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="row">
                                    <form class="row g-3" action="{{ route('createNewOrders') }}" method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <label class="form-label">الاسم الاول</label>
                                            <input type="text" name="name" value="{{ auth()->user() ? auth()->user()->name : '' }}"  {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">اسم العائلة</label>
                                            <input type="text" name="name_1" value="{{ auth()->user() ? auth()->user()->name : '' }}"   {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">البريد الالكتروني</label>
                                            <input type="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}"   {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">
                                        </div>
                                        <!--<div class="col-md-6">-->
                                        <!-- <label class="form-label">البريد الالكتروني</label>-->
                                        <!--    <input type="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}"  {{ auth()->user() ? '' : 'required' }} class="form-control rounded-0">-->
                                        <!--</div>-->
                                        <div class="col-md-6">
                                            <label class="form-label">رقم الهاتف </label>
                                            <input type="number" name="phone" value="{{ auth()->user() ? auth()->user()->phone : '' }}" {{ auth()->user() ? '' : 'required' }}  class="form-control rounded-0">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">المدينة</label>
                                            <select class="form-select rounded-0" {{ auth()->user() ? '' : 'required' }} name="governorate">
                                                <option value="" disabled selected>-اختر من القائمه-</option>
                                                <option>ابو ظبى  </option>
                                                <option>دبى</option>
                                                <option>الشارقة</option>
                                                <option>عجمان</option>
                                                <option>أم القيوين</option>
                                                <option>راس الخيمة</option>
                                                <option> الفجيره  </option>
                                                <option> خورفكان   </option>
                                                <option> دبا  </option>
                                                <option> كلباء   </option>
                                            </select>
                                        </div>



                                        <div class="col-md-6">
                                            <label class="form-label"> العنوان/ رقم الفيلا او الشقة </label>
                                            <input type="text" name="address" value="{{ auth()->user() ? auth()->user()->address : '' }}" {{ auth()->user() ? '' : 'required' }}  class="form-control rounded-0">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="d-grid">

                                                <button class="btn btn-dark btn-ecomm"> Checkout<i class='bx bx-chevron-right'></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </li>

{{--                        <li>--}}
{{--                            <h6--}}
{{--                                class="title collapsed"--}}
{{--                                data-bs-toggle="collapse"--}}
{{--                                data-bs-target="#collapseFour"--}}
{{--                                aria-expanded="false"--}}
{{--                                aria-controls="collapseFour"--}}
{{--                            >--}}
{{--                                معلومات الدفع--}}
{{--                            </h6>--}}
{{--                            <section--}}
{{--                                class="checkout-steps-form-content collapse"--}}
{{--                                id="collapseFour"--}}
{{--                                aria-labelledby="headingFour"--}}
{{--                                data-bs-parent="#accordionExample"--}}
{{--                            >--}}
{{--                                <!-- id="collapsefive"--}}
{{--                                aria-labelledby="headingFive"--}}
{{--                                data-bs-parent="#accordionExample" -->--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="checkout-payment-form">--}}
{{--                                            <div class="single-form form-default">--}}
{{--                                                <label>إسم صاحب البطاقة</label>--}}
{{--                                                <div class="form-input form">--}}
{{--                                                    <input--}}
{{--                                                        type="text"--}}
{{--                                                        placeholder="إسم صاحب البطاقة"--}}
{{--                                                    />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-form form-default">--}}
{{--                                                <label> رقم البطاقة </label>--}}
{{--                                                <div class="form-input form">--}}
{{--                                                    <input--}}
{{--                                                        id="credit-input"--}}
{{--                                                        type="text"--}}
{{--                                                        placeholder="0000 0000 0000 0000"--}}
{{--                                                    />--}}
{{--                                                    <img--}}
{{--                                                        src="assets/images/payment/card.png"--}}
{{--                                                        alt="card"--}}
{{--                                                    />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="payment-card-info">--}}
{{--                                                <div class="single-form form-default mm-yy">--}}
{{--                                                    <label> انتهاء الصلاحية</label>--}}
{{--                                                    <div class="expiration d-flex">--}}
{{--                                                        <div class="form-input form">--}}
{{--                                                            <input type="text" placeholder="MM" />--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-input form">--}}
{{--                                                            <input type="text" placeholder="YYYY" />--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="single-form form-default">--}}
{{--                                                    <label--}}
{{--                                                    >CVC/CVV--}}
{{--                                                        <span><i class="mdi mdi-alert-circle"></i></span--}}
{{--                                                        ></label>--}}
{{--                                                    <div class="form-input form">--}}
{{--                                                        <input type="text" placeholder="***" />--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-form form-default button">--}}
{{--                                                <button class="btn">ادفع الآن</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </section>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-price-table mt-30">
                        <h5 class="title">معلومات الطلب</h5>
                                                                @foreach (Cart::instance('shopping')->content() as $row)
                                                                <div class="d-flex align-items-center">
                                                                    <a class="d-block flex-shrink-0" href="javascript:;">
                                                                        <img src="{{asset('dash/product/'.\App\Models\Product::where('id',$row->id)->first()->photo)}}" width="75" alt="Product">
                                                                    </a>
                                                                    <div class="ps-2">
                                                                        <h6 class="mb-1"><a href="javascript:;" class="text-dark">{{ $row->name }}</a></h6>
                                                                        <div class="widget-product-meta"><span class="me-2">
                                                                           {{$row->price}} AED * {{$row->qty}}
                                                                            </span>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">السعر الكلي :</p>
                                <p class="price">${{ Cart::subtotal() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Checkout Form Steps Part Ends ======-->

@endsection

@section('js')

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
