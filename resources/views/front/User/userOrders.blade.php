@extends('front.layOut.master')

@section('content')
    <style>
        #orders th, #orders td {
            text-align: center;
        }
    </style>
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">حساب کاربری</a></li>
                <li><a href="checkout.html">لیست سفارشات</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">لیست سفارشات</h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if($orders)
                                        <table class="table table-responsive" id="orders">
                                            <thead>
                                            <tr>
                                                <th>شماره سفارش</th>
                                                <th>وضعیت سفارش</th>
                                                <th>وضعیت پرداخت</th>
                                                <th>تاریخ ثبت</th>
                                                <th>جزییات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->stringStatus()}}</td>
                                                    <td>{{$order->payment()->first()->stringStatus()}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>
                                                        <a href="/user-order-details/{{$order->id}}"
                                                           class="btn btn-sm btn-success">مشاهده</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h4 class="alert alert-danger text-center">سفارشی موجود نمی باشد.</h4>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
@endsection
