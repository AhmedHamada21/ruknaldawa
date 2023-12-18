@extends('front.layouts.master')
@section('css')

@endsection
@section('contact')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">معلوماتي الشخصية</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="index.html"><i class="lni lni-home"></i> الرئيسيه</a>
                        </li>
                        <li>معلوماتي الشخصية</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account  Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="register-form">
                        <form class="row" method="post">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">الاسم الاول</label>
                                    <input class="form-control" type="text" id="reg-fn" value="{{Auth::user()->name}}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email"> البريد الالكتروني</label>
                                    <input class="form-control" type="email" id="reg-email" value="{{Auth::user()->email}}" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-phone">الهاتف</label>
                                    <input class="form-control" type="text" id="reg-phone" value="{{Auth::user()->phone}}" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-phone">العنوان</label>
                                    <input class="form-control" type="text" id="reg-phone" value="{{Auth::user()->address}}" required />
                                </div>
                            </div>

{{--                            <div class="button">--}}
{{--                                <button class="btn" type="submit">تعديل</button>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
