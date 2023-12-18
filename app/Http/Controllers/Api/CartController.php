<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addTocart(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',

            ]);
            if ($validator->fails()) {
                return responseFail($validator->errors(), 400);
            }

            $product = Product::findorfail($request->product_id);

            $cart = Cart::add($product->id, $product->name, 1, $product->price);

            if ($cart) {
                $ShoppingCart =  ShoppingCart::create([
                    'rowId' => $cart->rowId,
                    'product_id' => $request->product_id,
                    'qty' => $cart->qty,
                    'tax' => $cart->tax,
                    'subtotal' => $cart->subtotal,
                ]);

                if ($ShoppingCart) {
                    return responseSuccess(new ProductResource($product), 'Add To Cart Successfully', 200);
                }
            } else {
            }
            return responseFail('some thing error', 400, 'some thing error');
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');
        }
    }
    public function checkInCart(Request $request)
    {
        try {
       
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',

            ]);
            if ($validator->fails()) {
                return responseFail($validator->errors(), 400);
            }
            
            $product = Product::findorfail($request->product_id);
            $cart = ShoppingCart::where('product_id',$request->product_id)->first();
         
            if ($cart) {
                return responseSuccess([], 'The Product ' . $product->name . ' already existed In Cart', 200);
            } else {
                return responseSuccess([], 'The Product  Not existed In Cart', 200);
            }
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');
        }
    }
    public function deletedInCart(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',

            ]);
            if ($validator->fails()) {
                return responseFail($validator->errors(), 400);
            }
            $product = Product::findorfail($request->product_id);
            $cart = ShoppingCart::where('product_id',$request->product_id)->first();
            if ($cart) {
                $cart->delete();
                return responseSuccess([], 'The Product ' . $product->name . 'Deleted Successfully In Cart', 200);
            } else {
                return responseSuccess([], 'The Product Not existed In Cart', 200);
            }
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');
        }
    }
}
