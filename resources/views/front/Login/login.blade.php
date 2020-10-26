@extends('front.layOut.master')

@section('content')
    <div id="container">

        <div class="container">
            <div class="row">
                <!--Middle Part Start-->
                <div class="row">
                    <div class="col-12 col-lg-6 mb-5">

                        <div class=" mb-4">
                            <div class="panel-body  ">

                                <form class="  w-100" method="post"  action={{route('auth.verifyCode')}} >
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="phone">شماره تماس</label>



                                        <input type="text" name="phone" value="{{old("phone")}}" placeholder="شماره تماس" id="phone" class="form-control" />
                                        @error('phone')
                                        <div class="invalid-feedback error-input d-block  ">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>



                                    <input type="submit" value="ورود" class="btn btn-primary" />
{{--                                    <button type="submit" class="btn btn-primary mb-0 mt-3" onclick="setPhoto()">ارسال</button>--}}

                                    <!-- /.box-footer -->
                                </form>




                            </div>
                        </div>


                    </div>


                </div>

                <!--Middle Part End-->
            </div>
        </div>
    </div>
@endsection
