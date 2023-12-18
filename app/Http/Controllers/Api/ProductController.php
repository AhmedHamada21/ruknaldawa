<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $data = Product::all();
            return responseSuccess(ProductResource::collection($data), 'Data Return Successfully', 200);
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }
    }


    public function show($id)
    {
        try {
            $data = Product::findorfail($id);
            return responseSuccess(new ProductResource($data), 'Data Return Successfully', 200);

        } catch (\Exception $e) {
            return responseFail('the Product in not Found !!', 400);

        }
    }
}
