@extends('front.layouts.master')
@section('css')
    
@endsection
@section('contact')
    	
<!--start breadcrumb-->
<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->
<!--start shop cart-->
<section class="py-4">
    <div class="container">
        <div class="shop-cart">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="shop-cart-list mb-3 p-3">
                @foreach (Cart::instance('shopping')->content() as $row)
       
                <div class="row align-items-center g-3">
        <div class="col-12 col-lg-6">
            <div class="d-lg-flex align-items-center gap-3">
                <div class="cart-img text-center text-lg-start">
                    <img src="{{asset('dash/product/'.\App\Models\Product::where('id',$row->id)->first()->photo)}}" width="130" alt="">
                </div>
                <div class="cart-detail text-center text-lg-start">
                    <h6 class="mb-2">{{ $row->name }}</h6>
                    <h5 class="mb-0"><span class="price" data-initial="{{ $row->price }}">{{ $row->price }}</span> AED  * {{$row->qty}}</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
          <div class="cart-action text-center">
                                    <form action="{{ route('updateCountAndProice') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="row_id" value="{{ $row->rowId }}">
                                        <input type="number" onchange="this.form.submit()" class="form-control rounded-0" name="quny" value="{{$row->qty}}" min="1"> 
                                    </form>
                                    
                                </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="text-center">
                <div class="d-flex gap-3 justify-content-center justify-content-lg-end">
                    <form action="{{route('DeletedCart')}}" method="post">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{Cart::instance('shopping')->content()->where('id',$row->id)->first()->rowId}}">
                        <button class="btn btn-outline-dark rounded-0 btn-ecomm"><i class='bx bx-x'></i>Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                     <hr>
                    @endforeach
                       
                      
                     
                        <hr>			
                        <div class="d-lg-flex align-items-center gap-2">
                            <a href="{{ route('shop') }}" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="checkout-form p-3 bg-light">
                       
                      
                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                            <div class="card-body">
                                <p class="mb-2">
                                    
                                    
                                    المجموع الفرعي
                                    
                                   <span id="" class="float-end">{{Cart::instance('shopping')->subtotal() }} AED</span>

                                </p>
                               
                                <div class="my-3 border-top"></div>
                                <h5 class="mb-0">
                                    
                                
                                    الطلب الكلي 
                                    <span id="subtotal" class="float-end">{{ Cart::instance('shopping')->subtotal() }} AED</span>
                                    
                                    
                                    </h5>
                                <div class="my-4"></div>
                                <div class="d-grid"> <a href="{{ route('checkoutDetails') }}" class="btn btn-dark btn-ecomm">
                                    إتمام الطلب</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</section>
<!--end shop cart-->
    
@endsection

@section('js')

<script>
    function updatePrice(input) {
        const priceElement = input.parentNode.parentNode.previousElementSibling.querySelector('.price');
        const initialPrice = parseFloat(priceElement.getAttribute('data-initial'));
        const quantity = parseInt(input.value) || 0;
        const totalPrice = initialPrice * quantity;
        priceElement.textContent = totalPrice.toFixed(2);
    }
</script>



@endsection
