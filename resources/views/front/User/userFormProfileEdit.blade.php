@extends('front.layOut.master')

@section('content')
    <div id="container">
        <div id="container">
            <div   class="container">
                <!-- Breadcrumb Start-->

                <ul class="breadcrumb">
                    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                    <li><a href="login.html">حساب کاربری</a></li>
                    <li><a href="login.html">ورود</a></li>
                </ul>
                <!-- Breadcrumb End-->
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-9">
                        <h1 class="title">حساب کاربری ورود</h1>
                        <div class="row">

                            <div class="col-sm-12">
                                <h2 class="subtitle">اطلاعات کلی</h2>
{{--                                <p><strong>اطلاعات کلی </strong></p>--}}
{{--                                $table->string('name');--}}
{{--                                $table->string('email')->unique()->nullable();--}}
{{--                                $table->string('birthday');--}}
{{--                                $table->tinyInteger('gender');--}}
{{--                                $table->string('national_code');--}}

                                <form class="  w-100" method="post"  action={{route('user-profile-edit')}} >
                                @csrf
                                    <div class="m-0 row">
                                        <div class="form-group col-12 col-md-6 required">
                                            <label class="control-label d-ltr  " for="name">نام و نام خانوادگی</label>
                                            <input type="text" name="name" value="" placeholder="نام و نام خانوادگی" id="name" class="form-control" />
                                            @error('name')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 required">
                                            <label class="control-label d-ltr " for="birthday">تاریخ تولد</label>
                                            <input type="text" name="birthday" value="" placeholder="تاریخ تولد" id="birthday" class="form-control" />
                                            @error('birthday')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 required">
                                            <label class="control-label d-ltr" for="national_code">کد ملی</label>
                                            <input type="text" name="national_code" value="" placeholder="تاریخ تولد" id="national_code" class="form-control" />
                                            @error('national_code')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                        <div class="form-group col-12 col-md-6  ">
                                            <label class="control-label" for="email">ایمیل</label>
                                            <input type="email" name="email" value="" placeholder="تاریخ تولد" id="email" class="form-control" />
                                            @error('email')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                        <div class="form-group col-12 col-md-6  ">
                                            <label class="control-label " for="phone">شماره تماس </label>
                                            <p>09112561701</p>
                                            {{--                                        <input type="email" name="email" value="" placeholder="تاریخ تولد" id="email" class="form-control" />--}}
                                        </div>


                                        <div class="form-group col-12 col-md-6 required">
                                            <label class="control-label d-ltr" for="national_code">جنسیت</label>
                                            <div class="w-100">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="0" checked>خانم
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" value="1" name="gender">آقا
                                                </label>
                                            </div>
                                            @error('gender')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>


                                    <h2 class="subtitle">آدرس</h2>
                                    <div class="m-0 row">
                                        <div class="form-group col-12 col-md-6 ">
                                            <label class="control-label" for="company">نام شرکت (اختیاری)</label>
                                            <input type="text" name="company" value="" placeholder="شرکت" id="company" class="form-control" />
                                            @error('company')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 required">
                                            <label class="control-label d-ltr" for="post_code">کد پستی</label>
                                            <input type="text" name="post_code" value="" placeholder="شرکت" id="post_code" class="form-control" />
                                            @error('post_code')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div id="app">
                                            <select-city-component></select-city-component>


                                        </div>

                                        {{--                                    <div class="form-group col-12 col-md-6 required">--}}
                                        {{--                                        <label class="control-label d-ltr" for="province">استان</label>--}}


                                        {{--                                        <select name="province_id" id="province" class="form-control">--}}
                                        {{--                                            <option value="مازندران">مازندران</option>--}}
                                        {{--                                            <option value="تهران">تهارن</option>--}}
                                        {{--                                            <option value="گیلان">گیلان</option>--}}
                                        {{--                                            <option value="لرستان">لرستان</option>--}}
                                        {{--                                        </select>--}}

                                        {{--                                    </div>--}}
                                        {{--                                    <div class="form-group col-12 col-md-6 required">--}}
                                        {{--                                        <label class="control-label d-ltr" for="city">شهر</label>--}}

                                        {{--                                        <select name="city_id" id="city" class="form-control">--}}
                                        {{--                                            <option value="ساری">ساری</option>--}}
                                        {{--                                            <option value="بابل">بابل</option>--}}
                                        {{--                                            <option value="قاتمشهر">قائمشهر</option>--}}
                                        {{--                                            <option value="نکا">نکا</option>--}}
                                        {{--                                        </select>--}}

                                        {{--                                    </div>--}}


                                        <div class="form-group col-12 col-md-12 required">
                                            <label class="control-label d-ltr" for="address">آدرس</label>
                                            <input type="text" name="address" value="" placeholder="شرکت" id="address" class="form-control" />
                                            @error('address')
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        {{--                                    $table->increments('id');--}}
                                        {{--                                    $table->text('address');--}}
                                        {{--                                    $table->string('company')->nullable();--}}
                                        {{--                                    $table->string('post_code'--}}


                                    </div>





                                    {{--                                <div class="form-group">--}}
                                    {{--                                    <label class="control-label" for="input-password">رمز عبور</label>--}}
                                    {{--                                    <input type="password" name="password" value="" placeholder="رمز عبور" id="input-password" class="form-control" />--}}
                                    {{--                                    <br />--}}
                                    {{--                                    <a href="#">فراموشی رمز عبور</a></div>--}}
                                    <input type="submit" value="ثبت" class="btn btn-primary" />
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                    <!--Right Part Start -->
                @include('front.Login.partial.sideUserLinks')
                    <!--Right Part End -->
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section("js-import")--}}
{{--<script src="{{asset('js/app.js')}}"></script>--}}
{{--@endsection--}}
