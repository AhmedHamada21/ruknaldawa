@extends('front.layouts.master')
@section('css')
    
@endsection
@section('contact')
    	
	<!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3" style="font-family: 'Cairo', sans-serif;">
                    @if($pages == "contact")
                    تواصل معانا
                    @elseif ($pages=="dervider")
                    التوصيل
                    @elseif($pages == "terms")
                    شروط وأحكام الموقع
                  @else
                  برنامج التسويق بالعمولة
                    @endif
                </h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i
                                        class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item active" style="font-family: 'Cairo', sans-serif;" aria-current="page">
                                @if($pages == "contact")
                                تواصل معانا
                                @elseif ($pages=="dervider")
                                التوصيل
                                @elseif($pages == "terms")
                                شروط وأحكام الموقع
                              @else
                              برنامج التسويق بالعمولة
                                @endif    
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start page content-->
    <section class="py-0 py-lg-4">
        <div class="container">
         
            <p>
                {!! $data->text ?? null !!}    
            </p>

        </div>
    </section>
    
    
    
    
@endsection