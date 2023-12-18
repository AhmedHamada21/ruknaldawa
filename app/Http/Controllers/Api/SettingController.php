<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $data = Setting::first();
            return responseSuccess(new SettingResource($data), 'Data Return Successfully', 200);

        } catch (\Exception $e) {
            return responseFail('the Slider in not Found !!', 400);

        }
    }
}
