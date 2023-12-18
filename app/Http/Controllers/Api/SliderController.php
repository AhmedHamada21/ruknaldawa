<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        try {
            $data = Slider::all();
            return responseSuccess(SliderResource::collection($data), 'Data Return Successfully', 200);
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }
    }


    public function show($id)
    {
        try {
            $data = Slider::findorfail($id);
            return responseSuccess(new SliderResource($data), 'Data Return Successfully', 200);

        } catch (\Exception $e) {
            return responseFail('the Slider in not Found !!', 400);

        }
    }
}
