<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::all();
        return view('admin.sliders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Slider();
        $data->name = $request->name;
        $data->notes = $request->notes;

        if (isset($request->photo)) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move('dash/slider/', $imageName);
            $data->photo = $imageName;
        }

        $data->save();
        session()->flash('message', 'تم حفظ البيانات بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::findorfail($id);
        return view('admin.sliders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Slider::findorfail($request->id);
        $data->name = $request->name;
        $data->notes = $request->notes;

        if (isset($request->photo)) {
            if (file_exists('dash/slider/' . $request->oldfile)) {
                File::delete('dash/slider/' . $request->oldfile);
            }
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move('dash/slider/', $imageName);
            $data->photo = $imageName;
        }

        $data->save();
        session()->flash('message', 'تم التعديل البيانات بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Slider::destroy($request->id);
        session()->flash('message', 'تم الحذف البيانات بنجاح');
        return redirect()->back();
    }
}
