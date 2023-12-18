<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;

if (!function_exists('getInformation')) {
    function getInformation()
    {
        $data = Setting::first();
        if (!empty($data)) {
            return $data;
        }
    }
}
if (!function_exists('getCategory')) {
    function getCategory()
    {
        $data = Category::get();
        if (!empty($data)) {
            return $data;
        }
    }
}
if (!function_exists('getSliders')) {
    function getSliders()
    {
        $data = Slider::limit(3)->get();
        if (!empty($data)) {
            return $data;
        }
    }
}

if (!function_exists('getProductsLimit')) {
    function getProductsLimit()
    {
        $data = Product::inRandomOrder()->limit(4)->get();
        if (!empty($data)) {
            return $data;
        }
    }
}
if (!function_exists('getProducts')) {
    function getProducts()
    {
        $data = Product::inRandomOrder()->limit(20)->get();
        if (!empty($data)) {
            return $data;
        }
    }
}
if (!function_exists('getProducts8')) {
    function getProducts8()
    {
        $data = Product::inRandomOrder()->limit(8)->get();
        if (!empty($data)) {
            return $data;
        }
    }
}
if (!function_exists('getProductsBlogs')) {
    function getProductsBlogs()
    {
        $data = Product::inRandomOrder()->limit(3)->get();
        if (!empty($data)) {
            return $data;
        }
    }
}

if (!function_exists('getBlogs')) {
    function getBlogs()
    {
        $data = Blog::get();
        if (!empty($data)) {
            return $data;
        }
    }
}




if (!function_exists('responseSuccess')) {
    function responseSuccess($data = [], $msg = null, $code = 200)
    {
        return response()->json([
            "success" => true,
            "message" => $msg,
            "data" => $data
        ], 200);
    }
}


if (!function_exists('responseFail')) {
    function responseFail($error_msg = null, $code = 400, $result = null)
    {
        return response()->json([
            "message" => $error_msg,
            "errors" => $result,
            "code" => $code
        ], 400);
    }
}


