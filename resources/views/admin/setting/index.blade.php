@extends('admin.layouts.master')
@section('css')
@endsection

@section('title')
   الاعدادات العامه
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">الاعدادات العامه</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
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
        <form action="{{route('updatedSetting')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$setting->id}}">
            <div class="row clearfix">
                <div class="col">
                    <label>اسم الموقع</label>
                    <input type="text" name="name" value="{{$setting->name}}" class="form-control">
                </div>

                <div class="col">
                    <label>رقم الموقع</label>
                    <input type="text" name="phone" value="{{$setting->phone}}" class="form-control">
                </div>
            </div>

            <br>
            <div class="row clearfix">
                <div class="col">
                    <label>البريد الالكتروني </label>
                    <input type="email" name="email" value="{{$setting->email}}" class="form-control">
                </div>

                <div class="col">
                    <label>العنوان</label>
                    <input type="text" name="address" value="{{$setting->address}}" class="form-control">
                </div>
            </div>

            <br>
            <div class="row clearfix">
                <div class="col">
                    <label>facebook </label>
                    <input type="url" name="facebook" value="{{$setting->facebook}}" class="form-control">
                </div>

                <div class="col">
                    <label>linkedin</label>
                    <input type="url" name="linkedin" value="{{$setting->linkedin}}" class="form-control">
                </div>

                <div class="col">
                    <label>twitter</label>
                    <input type="url" name="twitter" value="{{$setting->twitter}}" class="form-control">
                </div>
            </div>

            <br>

            <div class="row clearfix">
                <div class="col">
                    <label>وصف الموقع</label>
                    <textarea class="summernote"  name="notes" rows="5">
                        {{$setting->notes}}
                    </textarea>
                </div>
            </div>

          
            <br>

            <div class="row clearfix">
                <div class="col" style="text-align: center">
                    <button class="btn btn-success text-center">تحديث البيانات</button>
                </div>
            </div>

        </form>

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
