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
@endsection


@section('contact')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('sliders.update','test')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$data->id}}" name="id">
                            <div class="row">
                                <div class="col">
                                    <label>العنوان</label>
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>وصف المنتج</label>
                                    <textarea class="summernote" name="notes" rows="5">
                                        {{$data->notes}}
                                    </textarea>
                                </div>
                            </div>

                            <br>

                            <div class="row clearfix">
                                <div class="col">
                                    <label>صوره </label>
                                    <input type="file" accept="image/*" name="photo"  onchange="loadFile(event)">
                                    @if(isset($data->photo))
                                        <img src="{{asset('dash/slider/' . $data->photo)}}" width="100px" height="100px" alt="">
                                        <input type="hidden" name="oldfile" value="{{$data->photo}}">
                                    @endif
                                    <img id="output" width="100px" height="100px"/>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col" style="text-align: center">
                                    <button class="btn btn-success">حفظ البيانات</button>
                                    <a href="{{route('sliders.index')}}" class="btn btn btn-info">الصفحه الرئسيه</a>
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
