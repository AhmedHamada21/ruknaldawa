<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $data = Category::all();
            return responseSuccess(CategoryResource::collection($data), 'Data Return Successfully', 200);
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }
    }


    public function show($id)
    {
        try {
            $data = Category::findorfail($id);
            return responseSuccess(new CategoryResource($data), 'Data Return Successfully', 200);

        } catch (\Exception $e) {
            return responseFail('the Category in not Found !!', 400);

        }
    }
}
