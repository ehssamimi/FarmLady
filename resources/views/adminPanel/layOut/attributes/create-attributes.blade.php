@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"attributes","sub"=>"create-attributes"])


@section("content")


    <main>
        <div class="container-fluid">
            @include('adminPanel.master.partial.Header',["main"=>"ایجاد ویژگی" ])
{{--            @if ($errors->any())--}}

{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="row">
                <div class="col-12 col-lg-6 mb-5">

                    <div class="card mb-4">
                        <div class="card-body">

                            <form class="  w-100" method="post"  action={{route('attribute.store')}} >
                                @csrf
                                <div class="form-group has-float-label">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="نام ویژگی را واد کنید "   />
                                    <span>نام</span>

                                    @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>

{{--                                <div class="form-group position-relative error-l-50">--}}
{{--                                    <label for="name">نام: </label>--}}
{{--                                    <input type="text" class="form-control" id="name" name="name" placeholder="نام ویژگی را واد کنید ">--}}

{{--                                        @error('name')--}}
{{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                        @enderror--}}

{{--                                </div>--}}

                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary mb-0 mt-3" onclick="setPhoto()">ارسال</button>

                                <!-- /.box-footer -->
                            </form>




                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>

@endsection
