@extends('front.layOut.master')

@section('content')
    <style>
        #order_items th, #order_items td {
            text-align: center;
        }

        .text-bold {
            font-weight: bolder;
            font-size: 18px;
        }
        .bg-light{
            background-color: #eee !important;
        }
    </style>
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">حساب کاربری</a></li>
                <li><a href="checkout.html">مشاهده جزییات سفارش شماره {{$order->id}}</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">جزییات سفارش شماره {{$order->id}}</h1>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-location-arrow"></i>
                                        آدرس گیرنده
                                    </h4>
                                </div>
                                <div class="panel-body text-center">
                                    {{$order->address()->first()->address}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-truck"></i>
                                        شیوه تحویل
                                    </h4>
                                </div>
                                <div class="panel-body text-center">
                                    {{$order->stringDelivery()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-credit-card"></i>
                                        شیوه پرداخت
                                    </h4>
                                </div>
                                <div class="panel-body text-center">
                                    {{$order->payment()->first()->stringMethod()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-question"></i>
                                        وضعیت سفارش
                                    </h4>
                                </div>
                                <div class="panel-body text-center">
                                    {{$order->stringStatus()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-responsive" id="order_items">
                                        <thead>
                                        <tr>
                                            <th>نام محصول</th>
                                            <th>تصویر</th>
                                            <th>قیمت</th>
                                            <th>تعداد</th>
                                            <th>قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->order_items as $item)
                                            <tr>
                                                <td>{{$item->product()->first()->title}}</td>
                                                <td>
                                                    <img src="{{$item->product()->first()->photos()->first()->path}}"
                                                         alt="">
                                                </td>
                                                <td>
                                                    {{$item->product()->first()->price}}تومان
                                                </td>
                                                <td>
                                                    {{$item->count}}
                                                </td>
                                                <td>{{$item->product()->first()->price * $item->count}} تومان</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-bold">جمع کل</td>
                                            <td colspan="2" class="text-bold">
                                                {{$order->totalPrice()}} تومان
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bg-light text-right">وضعیت پرداخت</td>
                                            <td colspan="2" class="bg-light">
                                                {{$order->payment()->first()->stringStatus()}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
