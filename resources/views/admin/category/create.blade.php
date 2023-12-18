@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
    اضافه جديده
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">اضافه جديده</a>
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
                        <form action="{{route('category.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label>العنوان</label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>

                            <br>




                            <div class="row">
                                <div class="col" style="text-align: center">
                                    <button class="btn btn-success">حفظ البيانات</button>
                                    <a href="{{route('category.index')}}" class="btn btn btn-info">الصفحه الرئسيه</a>

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
