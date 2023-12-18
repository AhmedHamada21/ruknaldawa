@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    تعديل البيانات
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">تعديل البيانات</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>
    </nav>

    <div id="myMessage">
        @if(session('message'))
            <div class="alert alert-success">
                <div>{{ session('message') }}</div>
            </div>
        @endif
    </div>
    <div id="myerror">
        @if(session('error'))
            <div class="alert alert-danger">
                <div>{{ session('error') }}</div>
            </div>
        @endif
    </div>
@endsection


@section('contact')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('product.update','product')}}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
@method('PUT')
<input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row">

                                <div class="col">
                                    <label>اسم المنتج</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>كود المنتج</label>
                                    <input type="text" name="product_code" value="{{$data->product_code}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>كميه المنتج</label>
                                    <input type="number" name="quantity" value="{{$data->quantity}}" class="form-control">
                                </div>

                            </div>

                            <br>

                            <div class="row">
                               
                               
                               
                                 <div class="col">
                                    <label>سعر المنتج  بالامارات</label>
                                    <input type="number" name="price" value="{{$data->price}}" class="form-control">
                                </div>
                                
                                <div class="col">
                                    <label>سعر المنتج قبل  الخصم</label>
                                    <input type="number" name="price_to" value="{{$data->price_to}}"  class="form-control">
                                </div>

                               
                                
                                <!--   <div class="col">-->
                                <!--    <label>سعر المنتج بعد الخصم بالريال</label>-->
                                <!--    <input type="number" name="price_rali" value="{{ $data->price_rali }}" class="form-control">-->
                                <!--</div>-->
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>الفئات</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="" disabled selected>-- اختر من القائمه --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $data->category_id ? 'selected' :null }} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>الصوره الاساسيه للمنتج</label>
                                    <input type="file" name="photo" accept="image/*" class="form-control" onchange="loadFile(event)"    >
                                    <img id="output" width="100px" height="100px"/>
                                    @if($data->photo)
                                        <img src="{{ asset('dash/product/' . $data->photo) }}" width="100px" height="100px" alt="">
                                    @endif
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>وصف المنتج</label>
                                    <textarea class="summernote" name="notes"  rows="5">
                                        {{ $data->notes }}
                                    </textarea>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>معلومات عن المنتج</label>
                                    <textarea class="summernote" name="info"  rows="5">
                                        {{ $data->info }}
                                    </textarea>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>صور المنتج</label>
                                    <input type="file" name="images[]" accept="image/*" multiple>
                                    @foreach ($data->ProductImages as $image)
                                    <img src="{{ asset('dash/ItemsProduct/' . $image->image) }}" width="100px" height="100px" alt="">
                                    @endforeach
                                </div>
                            </div>

{{--                            <br>--}}
{{--                            --}}

{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <label>الكلمات المفتاحيه</label>--}}

{{--                                    <input type="text" class="form-control" id="tags" --}}
{{--                                    value=" @foreach ($data->ProductTage as $tage)--}}
{{--                                        {{ $tage->name_tage  }}--}}
{{--                                    @endforeach " --}}
{{--                                    name="--}}
{{--                                    " data-role="tagsinput">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <br>

                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <button class="btn btn-success">حفظ البيانات</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')


    <script>
        // resources/js/app.js


        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>


   <!-- Tags Script start-->

   <script src='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'></script>

   <script>
    $(function () {
        $('input').on('change', function (event) {

            var $element = $(event.target);
            var $container = $element.closest('.example');

            if (!$element.data('tagsinput'))
               return;

            var val = $element.val();
            if (val === null)
               val = "null";
            var items = $element.tagsinput('items');

            // Update value display with green text
            $('code', $('pre.val', $container)).html($('<span>').text($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\"").css('color', 'dark'));

            // Update items display with blue text
            $('code', $('pre.items', $container)).html($('<span>').text(JSON.stringify($element.tagsinput('items'))).css('color', 'dark'));

        }).trigger('change');
    });
</script>


@endsection
