@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
    السليدر
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">السليدر</a>
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
                    <div class="header">
                        <h2><a href="{{route('sliders.create')}}" class="btn btn-success">اضافه جديده</a></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                      
                                      
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')

@endsection
