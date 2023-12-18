<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Information;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::where('is_admin', 0)->get();
        return view('admin.users.index', compact('data'));
    }
    public function index()
    {
        $data = Order::all();
        return view('admin.index', compact('data'));
    }

    public function setting()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function updatedSetting(Request $request)
    {
        $data = Setting::findorfail($request->id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->notes = $request->notes;

        if (isset($request->logo)) {
            if (file_exists(public_path('dash/photo/' . $request->oldfile))) {
                File::delete(public_path('dash/photo/' . $request->oldfile));
            }
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('dash/photo/'), $imageName);
            $data->logo = $imageName;
        }

        $data->save();
        session()->flash('message', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }

    public function aboutUs()
    {
        $data = AboutUs::first();
        return view('admin.aboutus.index', compact('data'));
    }

    public function UpdatedAboutUs(Request $request)
    {
        $data = AboutUs::findorfail($request->id);
        $data->text = $request->text;
        $data->save();
        session()->flash('message', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }

    public function page_update($type_page)
    {
        $data = Information::where('page', $type_page)->first();
        return view('admin.information.index', compact('data','type_page'));
    }

    public function updatePage(Request $request)
    {
        // dd($request->all());
        Information::updateOrcreate([
            'id' => $request->id,
        ], [
            'text'=> $request->text,
            'page'=> $request->pages,
        ]);


        // Information::findorfail($request->id)->update([
        //     'text'=> $request->text,
        //     'page'=> $request->pages,
        // ]);
        session()->flash('message', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
}
