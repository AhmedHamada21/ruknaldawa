@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
الصفحه الرئسيه
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);">Dashboard</a>
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
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body">
                    <h6> الزائرين</h6>
                    <h2>{{ \DB::table('visits')->sum('visit') }} <small class="info">visitors</small></h2>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body">
                    <h6>جميع الاعضاء</h6>
                    <h2>{{ App\Models\User::where('is_admin',0)->count() }} <small class="info">users</small></h2>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body">
                    <h6>طلبات الجديده</h6>
                    <h2>{{ App\Models\Order::where('status',0)->count() }} <small class="info">Orders</small></h2>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon sales">
                <div class="body">
                    <h6>طلب مكتمل</h6>
                    <h2>{{ App\Models\Order::where('status',1)->count() }} <small class="info">Orders</small></h2>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon email">
                <div class="body">
                    <h6>طلب مرفوض</h6>
                    <h2>{{ App\Models\Order::where('status',2)->count() }} <small class="info">Orders</small></h2>

                </div>
            </div>
        </div>

    </div>

    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>اجدد الطلبات</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover c_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>كود الطلب</th>
                                    <th>اسم المستخدم</th>
                                    <th>عنوان المستخدم</th>
                                    <th>محافظه المستخدم</th>
                                    <th>رقم المستخدم</th>
                                    <th>سعر الطلب</th>
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
