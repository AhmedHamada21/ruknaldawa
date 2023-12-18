<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Visit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
    //   $cart = Cart::instance('shopping')->content();
    //   dd($cart);
         $ip = request()->ip();
        $data = Visit::where('address_id', $ip)->first();
        if (!$data) {
             DB::table('visits')->insert([
                'visit' => 1,
                'address_id' => $ip,

            ]);
        }

        return view('front.index');
    }



    public function search_products(Request $request)
    {

        try{
              $id = Product::where('name','like',$request->search)->first();
        $row = Product::findorfail($id->id);
        return view('front.product.show', compact('row'));

           } catch (\Exception $ex) {
             toastr()->success('لا يوجد نتائح بحث برجاء المحاوله لاحقا', 'Seaech');
        return redirect()->back();
        }


    }







    public function pages_empty()
    {
        return view('front.pages_empty');
    }
    public function checkoutDetails()
    {
        return view('front.cart.finsh');
    }
    public function shoppingCart()
    {
        return view('front.cart.index');
    }

    public function product_show($id)
    {
        return view('front.product.show', [
            'data' => Product::findorfail($id),
        ]);
    }

    public function product()
    {
        return view('front.product.index', [
            'data' => Product::all(),
        ]);
    }

    public function account_dashboard()
    {
        return view('front.user.index');
    }

    public function shop()
    {
        return view('front.product.index');
    }
    public function shop_show($id)
    {
        $row = Product::findorfail($id);
        return view('front.product.show', compact('row'));
    }
    public function aboutUs()
    {
        return view('front.aboutus.index');
    }

    public function contact_us()
    {
        return view('front.contact-us.index');
    }
    public function blog()
    {
        return view('front.blogs.index');
    }

    public function blog_show($id)
    {
        $data = Blog::findorfail($id);
        return view('front.blogs.show', compact('data'));
    }


    public function addToCart(Request $request)
    {
        // add to Cart functions
        $product = Product::findorfail($request->product_id);
        Cart::instance('shopping')->add($request->product_id, $product->name, 1, $product->price);
        toastr()->success('Done Add To Cart Successfully !', 'Cart');
        return redirect()->back();
    }

    public function addToWishlist(Request $request)
    {
        // add to Cart functions
        $product = Product::findorfail($request->product_id);
        Cart::instance('wishlist')->add($request->product_id, $product->name, 1, $product->price);
        toastr()->success('Done Add To wishlist Successfully !', 'Cart');
        return redirect()->back();
    }


    public function getOrders()
    {
        $orders = Order::whereUserId(auth()->user()->id)->get();

        return view('front.user.orders', compact('orders'));
    }
    public function DeletedCart(Request $request)
    {

        Cart::instance('shopping')->remove($request->cart_id);
        toastr()->info('Done Deleted Cart Successfully !', 'Cart');
        return redirect()->back();
    }

    public function DeletedCartWishlist(Request $request)
    {

        Cart::instance('wishlist')->remove($request->cart_id);
        toastr()->info('Done Deleted wishlist Successfully !', 'Cart');
        return redirect()->back();
    }


    public function createNewOrders(Request $request)
    {
        // try {

            if (auth()->user()) {
                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'total' => Cart::instance('shopping')->subtotal(),

                    'status' => Order::ORDERCOMPTITED,
                    'code' => 'ORD-' . Str::random(6),
                ]);


                foreach ( Cart::instance('shopping')->content() as $item) {
                    DB::table('order_product')->insert([
                        'product_id' => $item->id,
                        'order_id' => $order->id,
                        'quantity' => $item->qty,
                    ]);
                }


                Cart::instance('shopping')->destroy();
                //  Mail::to('Top1Souq@gmail.com')->send(new \App\Mail\MyTestMail($order));
                //  Mail::to('hamada2031995@gmail.com')->send(new \App\Mail\MyTestMail($order));

                toastr()->success('Done Created Orders Successfully Login ', 'Order');
                return redirect()->route('home');
            }else{

                $user = User::create([
                    'name' => $request->name . ' ' . $request->name_1,
                    'email' => $request->email,
                    'password' => Hash::make($request->phone),
                    'is_admin' => 0,
                    'phone' => $request->phone,
                    'governorate' => $request->governorate ?? null,
                    'address' => $request->address,
                ]);

                if ($user) {
                    $order = Order::create([
                        'user_id' => $user->id,
                        'total' => Cart::instance('shopping')->subtotal(),

                        'status' => Order::ORDERCOMPTITED,
                        'code' => 'ORD-' . Str::random(6),
                    ]);

                        if($order){
                              foreach ( Cart::instance('shopping')->content() as $item) {
                                    DB::table('order_product')->insert([
                                    'product_id' => $item->id,
                                    'order_id' => $order->id,
                                     'quantity' => $item->qty,
                                    ]);
                            }
                        }


                }
                Cart::instance('shopping')->destroy();
                // Mail::to('Top1Souq@gmail.com')->send(new \App\Mail\MyTestMail($order));
                //  Mail::to('hamada2031995@gmail.com')->send(new \App\Mail\MyTestMail($order));

                toastr()->success('Done Created Orders Successfully ', 'Order');
                return redirect()->route('home');

            }





        // } catch (\Exception $ex) {
        //     return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        // }
    }


     public function updateCountAndProice(Request $request)
    {
        Cart::instance('shopping')->update($request->row_id, $request->quny);
        toastr()->success('Done Update quantity Successfully ', 'Order');
        return redirect()->back();
    }

    public function getInformation($pages)
    {
       $data = Information::where('page',$pages)->first();
       return view('front.pages_empty',compact('data','pages'));
    }
}
