<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Shoping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{

    public  function generateRandomString($length = 5) {
        $characters = 'ABCDEFGHWERTCKJLXCVNJKOP0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|string|unique:users',

           
        ]);

        if ($validator->fails()) {
            return responseFail($validator->errors(), 422);
        }
        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->phone),
            ]);


            $ShippingDetails = Shoping::create([
                'user_id' => $user->id,
                'name_address'=> $request->name_address ?? null,
                'last_name_address'=> $request->last_name_address ?? null,
                'region_address'=> $request->region_address ?? null,
                'address'=> $request->address ?? null,
                'address_1'=> $request->address_1 ?? null,
                'notes'=> $request->notes ?? null,
            ]);

            $orders = Order::create([
                'user_id'=> $user->id,
                'total'=> $request->total,
                'status'=> "0",
                'code'=> $this->generateRandomString(5),
            ]);


            Mail::to('aa.storeuae@gmail.com')->send(new \App\Mail\MyTestMail($orders));


            // foreach(as $produt){
            //     DB::table('order_product')->insert([
            //         'order_id'=> $orders->id,
            //         'product_id'=> $request->product_id,
            //         'quantity'=> $request->quantity,
            //     ]);
            // }

            DB::commit();
        
            return responseSuccess(OrderResource::collection($orders), 'Data Created Orders Successfully', 200);

        } catch (\Exception $e) {
            DB::rollback();
            return responseFail('some thing error', 400, 'some thing error');
        }
    }
}
