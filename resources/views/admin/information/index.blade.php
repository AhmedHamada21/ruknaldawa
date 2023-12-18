@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    صفحه
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">صفحه</a>
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
                    <form action="{{ route('updatePage') }}" method="post" autocomplete="off">
                        @csrf

                        <input type="hidden" name="id" value="{{ $data->id ?? null}}">
                        <input type="hidden" name="pages" value="{{ $type_page ?? null}}">


                        <div class="row">
                            <div class="col">
                                <label>تعديل المحتوي </label>
                                <textarea class="summernote" name="text" rows="10">
                                    {{ $data->text ?? null }}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">تعديل</button>
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



@endsection
