@extends('admin.layouts.master')
@section('css')
@endsection

@section('title')
    من نحن
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">من نحن</a>
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
        <form action="{{route('updatedaboutUs')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">

            <div class="row clearfix">
                <div class="col">
                    <label>من نحن</label>
                    <textarea class="summernote"  name="text" rows="5">
                        {{$data->text}}
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

@endsection
