@extends('admin.layouts.master')
@section('title')
الطلبات
@endsection

@section('css')

@endsection


@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);">الطلبات</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>كود الطلب</th>
                                    <th>اسم المستخدم</th>
                                    <th>عنوان المستخدم</th>
                                        <th>محافظه المستخدم</th>
                                    <th>رقم المستخدم</th>
                                    <th>سعر الطلب</th>
                                       <th>المنتجات</th>
                                    <th>حاله الطلب</th>
                                 

                                    <th>العمليات</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>

                                    <td>{{$row->code}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->user->address}}</td>
                                         <td>{{$row->user->governorate}}</td>
                                    <td>{{$row->user->phone}}</td>
                                    <td>{{$row->total}}</td>
                                    <td>
                                        @foreach ($row->products as $product)
                                            <ul>
                                                <li>
                                                   {{ $product->name}} /
                                                   {{ $product->pivot->quantity}}
                                                </li>
                                               
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{!!$row->status()!!}</td>
                                    <td>


                                        <div class="dropdown">
                                            <button class="btn btn-info  dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                العمليات
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal{{ $row->id }}"> <i class="fa fa-edit text-success"></i> تغير حاله الطلب</a>
                                            </div>
                                        </div>

                                    </td>
                                    @include('admin.order.edit')
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
