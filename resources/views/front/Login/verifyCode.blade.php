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

                                <form class="  w-100" method="post"  action={{route('validate.check')}} >
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="Inputcode">کد اارسالی </label>


                                        <input type="number" name="Inputcode" value="{{old("Inputcode")}}" placeholder="کد ارسالی" id="Inputcode" class="form-control" />
                                        @if($errors->any())
                                            <div class="invalid-feedback error-input d-block  ">
                                                {{$errors->first()}}
                                            </div>

                                        @endif


{{--                                        @error('Inputcode')--}}
{{--                                        <div class="invalid-feedback error-input d-block  ">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}

                                    <input type="submit" value="ورود" class="btn btn-primary" />
                                        <a class="btn btn-secondary"
{{--                                           href="{{route('auth.showLogin')}}"--}}
                                        >

                                        </a>

                                        <a class="btn btn-secondary" href="{{route('login')}}">
                                            بازگشت

                                        </a>
                                    </div>


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
