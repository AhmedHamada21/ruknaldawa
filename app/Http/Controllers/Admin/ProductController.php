<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\ProductTage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public  function generateRandomString($length = 6)
    {
        $characters = 'ABXDEF0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function index()
    {

        $data = Product::withCount('ProductTage')->get();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'code' => $this->generateRandomString(),
        ];
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        DB::beginTransaction();
//        try {
            $data = new Product();
            $data->name = $request->name;
            $data->category_id = $request->category_id;
            $data->product_code = $request->product_code;
            $data->price_to = $request->price_to;
//            $data->price_rali = $request->price_rali;
            $data->price = $request->price;
            $data->notes = $request->notes;
            $data->quantity = $request->quantity;
            $data->info = $request->info;
            if (isset($request->photo)) {
                $imageName = time() . '.' . $request->photo->extension();
                $request->photo->move('dash/product/', $imageName);
                $data->photo = $imageName;
            }
            $data->save();


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name =  time() . '.' .$file->getClientOriginalName();
                $file->move('dash/ItemsProduct/', $name);

                // Inset Date
                ProductPhoto::create([
                    'image' => $name,
                    'product_id' => Product::latest()->first()->id,
                ]);
            }
        }

//            DB::commit();
            session()->flash('message', 'تم حفظ البيانات بنجاح');
            return redirect()->back();
//        } catch (\Exception $e) {
//            DB::rollback();
//            session()->flash('error', '...هناك خطأ ما حدث برجاء المحاله لاحقا');
//            return redirect()->back();
//        }
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
        $data = [
            'data' => Product::findorfail($id),
            'categories' => Category::all(),
        ];
        return view('admin.product.edit', $data);
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
        DB::beginTransaction();
        try {
            $data = Product::findorfail($request->id);
            $data->name = $request->name;
            $data->category_id = $request->category_id;
            $data->product_code = $request->product_code;
            $data->price_to = $request->price_to;
            $data->price = $request->price;
            $data->notes = $request->notes;
            $data->quantity = $request->quantity;
            $data->info = $request->info;
            if (isset($request->photo)) {
                $imageName = time() . '.' . $request->photo->extension();
                $request->photo->move('dash/product/', $imageName);
                $data->photo = $imageName;
            }
            $data->save();

            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $file) {
                    $name =  time() . '.' .$file->getClientOriginalName();
                    $file->move('dash/ItemsProduct/', $name);

                    // Inset Date
                    ProductPhoto::updateOrCreate([
                        'product_id' =>$request->id,
                    ],[
                        'image' => $name,
                        'product_id' => Product::latest()->first()->id,
                    ]);
                }
            }


            DB::commit();
            session()->flash('message', 'تم التعديل البيانات بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', '...هناك خطأ ما حدث برجاء المحاله لاحقا');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        session()->flash('message', 'تم حذف البيانات بنجاح');
        return redirect()->back();

    }
}
