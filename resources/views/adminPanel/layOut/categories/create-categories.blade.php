@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"categories","sub"=>"create-category"])
@section("content")
    <main>
        <div class="container-fluid">
            @include('adminPanel.master.partial.Header',["main"=>"ایجاد دسته بندی" ])

            <div class="row">
                <div class="col-12 col-lg-6 mb-5">

                    <div class="card mb-4">
                        <div class="card-body">

                            <form class="  w-100" method="post"  action={{route('category.store')}} >
                                @csrf
                                <div class="form-group position-relative error-l-50">
                                    <label for="name">نام: </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="نام دسته بندی را واد کنید ">
                                    <div class="invalid-tooltip">
                                      نام دسته بندی
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label for="meta_title">متا تگ :</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="متا تگ را برای دسته بندی را واد کنید ">
                                    <div class="invalid-tooltip">
                                        نام دسته بندی
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label for="meta_desc">متا توضیحات :</label>
                                    <input type="text" class="form-control" id="meta_desc" name="meta_desc"  placeholder="متا توضیحات را برای دسته بندی را واد کنید ">
                                    <div class="invalid-tooltip">
                                        نام دسته بندی
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label  for="meta_keyword">متا کلید واژه :</label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"  placeholder="متا کلید واژه را برای دسته بندی را واد کنید ">
                                    <div class="invalid-tooltip">
                                        نام دسته بندی
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="parent_id"  >تگ پدر</label>
                                    <select class="form-control select2-single" name="parent_id" data-width="100%">
                                        <option value="تگ پدر را انتخاب کنید">تگ پدر را انتخاب کنید</option>
                                        @if( count($categories)>0)
                                            @foreach($categories as $category)
                                                <option value={{$category->id}}>{{$category->name}}</option>
                                                @if (count($category->childrenRecursive))
                                                    @include('adminPanel.layOut.categories.partial.partial-create-categories',["categories"=>$category->childrenRecursive,"level"=>1])
                                                @endif
                                            @endforeach
                                        @endif

                                    </select>



{{--                                        <select class="form-control col-sm-12 " id="parent_id" name="parent_id">--}}

{{--                                            <option value="تگ پدر را انتخاب کنید">تگ پدر را انتخاب کنید</option>--}}
{{--                                            @if( count($categories)>0)--}}
{{--                                                @foreach($categories as $category)--}}
{{--                                                    <option value={{$category->id}}>{{$category->name}}</option>--}}
{{--                                                    @if (count($category->childrenRecursive))--}}
{{--                                                        @include('adminPanel.layOut.categories.partial.partial-create-categories',["categories"=>$category->childrenRecursive,"level"=>1])--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}

{{--                                        </select>--}}




                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary mb-0 mt-3">ارسال</button>

                                <!-- /.box-footer -->
                            </form>



{{--                            <form class="needs-validation tooltip-label-right  " novalidate>--}}




{{--                                <div class="form-group has-float-label position-relative error-l-50">--}}
{{--                                    <input class="form-control " name="jQueryTopLabelsEmail"   />--}}
{{--                                    <span>Name</span>--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Name is required!--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                              --}}
{{--                                <button type="submit" class="btn btn-primary mb-0">Submit</button>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>

@endsection
