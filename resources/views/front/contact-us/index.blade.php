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
                        <h1 class="page-title">تواصل معنا</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="index.html"><i class="lni lni-home"></i> الرئيسيه</a>
                        </li>
                        <li>تواصل معنا</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>تواصل معنا</h2>
                            <p>
                                لا تتردد في التواصل معنا إذا كان لديك أي استفسار متعلق
                                بخدماتنا. سوف نبذل قصارى جهدنا للتواصل معك في أقرب وقت ممكن.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <i class="lni lni-map"></i>
                                    <h3>العنوان</h3>
                                    <ul>
                                        <li>
                                            7581 Ibn Al Faseeh, Al Uraija Al Wusta، RIUB2341، 2341 ,
                                            Riyadh 12973,Saudi Arabia
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <i class="lni lni-phone"></i>
                                    <h3>اتصل بنا علي</h3>
                                    <ul>
                                        <li><a href="tel:+966536750085">966536750085+</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <i class="lni lni-envelope"></i>
                                    <h3>البريد الالكتروني</h3>
                                    <ul>
                                        <li>
                                            <a href="mailto:ruknaldawa@gmail.com"
                                            >ruknaldawa@gmail.com</a
                                            >
                                        </li>
                                        <!-- <li>
                                          <a href="mailto:career@shopgrids.com"
                                            >career@shopgrids.com</a
                                          >
                                        </li> -->
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form
                                        class="form"
                                        method="post"
                                        action="assets/mail/mail.php"
                                    >
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input
                                                        name="name"
                                                        type="text"
                                                        placeholder="اسمك"
                                                        required="required"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input
                                                        name="subject"
                                                        type="text"
                                                        placeholder="الموضوع"
                                                        required="required"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input
                                                        name="email"
                                                        type="email"
                                                        placeholder="بريدك الالكتروني"
                                                        required="required"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input
                                                        name="phone"
                                                        type="text"
                                                        placeholder="هاتفك"
                                                        required="required"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group message">
                            <textarea
                                name="message"
                                placeholder="رسالتك ....."
                            ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn">ارسال</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->

@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
@endsection
