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
            @if (session('cart'))
                <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">تسویه حساب</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <form action="/cart-checkout" method="post">
                                        @csrf
                                        <div class="col-sm-4">
                                            <div class="panel panel-default" style="min-height: 200px">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <i class="fa fa-location-arrow"></i>
                                                        آدرس گیرنده
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    @foreach($addresses as $address)
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio"
                                                                       {{$loop->iteration ===1 ? 'checked' : ''}}
                                                                       value="{{$address->id}}"
                                                                       name="address_id">
                                                                {{$address->address}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="panel panel-default" style="min-height: 200px">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><i class="fa fa-truck"></i> شیوه ی تحویل
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <p>لطفا یک شیوه حمل و نقل انتخاب کنید.</p>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" checked="checked" name="delivery_type"
                                                                   value="{{\App\Order::FREE}}">
                                                            رایگان - 0 تومان</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="delivery_type"
                                                                   value="{{\App\Order::CONSTANT}}">
                                                            هزینه ی ثابت - 8000 تومان</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="delivery_type"
                                                                   value="{{\App\Order::SEPARATED}}">
                                                            ارسال هر آیتم به صورت جداگانه - 150000 تومان</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="panel panel-default" style="min-height: 200px">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><i class="fa fa-credit-card"></i> شیوه
                                                        پرداخت
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <p>لطفا یک شیوه پرداخت برای سفارش خود انتخاب کنید.</p>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" checked="checked" name="payment_method"
                                                                   value="{{\App\Payment::ONLINE}}">
                                                            پرداخت آنلاین</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="payment_method"
                                                                   value="{{\App\Payment::OFFLINE}}">
                                                            واریز در محل</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <td class="text-center">تصویر</td>
                                                                <td class="text-left">نام محصول</td>
                                                                <td class="text-left">تعداد</td>
                                                                <td class="text-right">قیمت واحد</td>
                                                                <td class="text-right">کل</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach(\session('cart')->items as $product)
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <a href="product.html">
                                                                            <img
                                                                                src="{{$product['item']->photos[0]->path}}"
                                                                                alt="{{$product['item']->title}}"
                                                                                title="$product['item']->title"
                                                                                class="img-thumbnail">
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <a href="">
                                                                            {{$product['item']->title}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <div class="input-group btn-block"
                                                                             style="max-width: 200px;">
                                                                            <input type="text" name="quantity"
                                                                                   value="{{$product['qty']}}"
                                                                                   size="1"
                                                                                   class="form-control">
                                                                            <span class="input-group-btn">
                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary"
                                            data-original-title="بروزرسانی">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"
                                            onclick="" data-original-title="حذف">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                    </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">{{$product['price']/$product['qty']}}
                                                                        تومان
                                                                    </td>
                                                                    <td class="text-right">{{$product['price']}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td class="text-right" colspan="4"><strong>جمع
                                                                        کل:</strong>
                                                                </td>
                                                                <td class="text-right">{{session('cart')->totalPrice}}
                                                                    تومان
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح
                                                        برای
                                                        سفارش.</h4>
                                                </div>
                                                <div class="panel-body">
                                            <textarea rows="4" class="form-control" id="confirm_comment"
                                                      name="description"></textarea>
                                                    <br>
                                                    <label class="control-label" for="confirm_agree">
                                                        <input type="checkbox" checked="checked" value="1" required=""
                                                               class="validate required" id="confirm_agree"
                                                               name="confirm agree">
                                                        <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span>
                                                    </label>
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <input type="submit" class="btn btn-primary"
                                                                   id="button-confirm"
                                                                   value="تایید سفارش">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                @else
                    <div class="row">
                        <div class="col-12">
                            <h2 class="alert alert-danger text-center">
                                سبد خرید شما خالی است.
                            </h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
