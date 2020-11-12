@extends('front.layOut.master')

@section('content')
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">سبد خرید</a></li>
                <li><a href="checkout.html">تسویه حساب</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="alert alert-success text-center">
                        سفارش شما با موفقیت ثبت شد.
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
