@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"products","sub"=>"create-products"])


@section("css-import")
{{--    <link rel="stylesheet" href={{asset("/admin/DropZone-min/basic.min.css")}}>--}}
{{--    <link rel="stylesheet" href={{asset("/admin/DropZone-min/dropzone.min.css")}}>--}}

@endsection
@section("content")
    <main>
        <div class="container-fluid">
            @include('adminPanel.master.partial.Header',["main"=>"ایجاد محصول" ])

            <div class="row">
                <div class="col-12   mb-5">

                    <div class="card mb-4">
                        <div class="card-body">

                            <form class="  w-100 row m-0" method="post"  action={{route('product.store')}} >
                                @csrf



{{--                                $table->increments('id');--}}
{{--                                $table->string("title");--}}
{{--                                $table->string("sku")->unique();--}}
{{--                                $table->string("slug")->unique();--}}
{{--                                $table->tinyInteger("status");--}}
{{--                                $table->float("price");--}}
{{--                                $table->float("discount_price")->nullable();--}}
{{--                                $table->text("description");--}}

                                <div class=" col-12 col-md-6">
                                    <div class="form-group has-float-label">

                                        {{--                                    <label for="title">نام</label>--}}
                                        <input type="text" class="form-control" id="title" name="title" placeholder="نام محصول را واد کنید "   />

                                        <span  >نام</span>
                                        {{--                                    <span>نام</span>--}}

                                        @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>




                                <div class=" col-12 col-md-6">
                                <div class="form-group has-float-label ">
                                    <label for="slug">  نام مستعار</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="نام مستعار را واد کنید "   />
                                    {{--                                    <span>نام</span>--}}

                                    @error('slug')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>


                                <div class=" col-12 col-md-6">
                                <div class="form-group has-float-label  ">
                                    <label for="price">قیمت</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="قیمت را واد کنید "   />

                                    @error('price')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>

                                <div class=" col-12 col-md-6">
                                <div class="form-group has-float-label ">
                                    <label for="discount_price">  قیمت با تخفیف  </label>
                                    <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="قیمت  با را واد کنید "   />

                                    @error('discount_price')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>

                                <div class=" col-12 col-md-6">
                                <div class="form-group has-float-label ">
                                    <label for="count"> تعداد </label>
                                    <input type="text" class="form-control" id="count" name="count" placeholder="تعداد محصول را واد کنید "   />

                                    @error('count')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>

                                <div class=" col-12 col-md-6">
                                    <div class="form-group   ">
                                        <label for="status" class="col-sm-2 control-label">وضعیت نشر</label>
                                        <div class="col-sm-10">
                                            <input type="radio" value="0" name="status"  style="vertical-align: text-top" checked ><span>فعال</span>
                                            <input type="radio" value="1" name="status" style="vertical-align: text-top" ><span>غیر فعال</span>
                                        </div>
                                    </div>
                                </div>



                                <div class=" col-12  ">
                                <div class="form-group has-float-label   ">
                                    <label for="description">  توضیحات محصول </label>
                                    <textarea   row="4" class="form-control ckeditor" id="description" name="description" placeholder="توضیحات">
                                    </textarea>

                                    @error('discount_price')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>
                                <div class=" col-12 col-md-6">
                                <div class="form-group  ">
                                    <label  class="col-sm-2 control-label">عکس</label>
                                    <div class=" dropzone col-sm-10 m-2" id="photo" ></div>
                                    <input type="hidden" class="form-control" id="photo_id" name="photo_id[]" >
                                </div>
                                </div>



{{--                                <div class="form-group">--}}
{{--                                    <label for="description" class="col-sm-2 control-label"> توضیحات  </label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                    <textarea   row="4" class="form-control ckeditor" id="description" name="discount_price" placeholder="توضیحات">--}}
{{--                                    </textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                --}}


{{--                                <div class="form-group">--}}
{{--                                    <label for="discount_price" class="col-sm-2 control-label"> قیمت با تخفیف  </label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="قیمت با تخفیف">--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class=" col-12 col-md-6">
                                    <div class="form-group      ">
                                        <label for="categories"  >دسته بندی</label>
                                        {{--                                    <select class="form-control select2-single" name="parent_id" data-width="100%">--}}

                                        <select class="form-control select2-multiple w-100" multiple="multiple" data-width="100%" name="categories[]">
                                            <option value="دسته بندی را انتخاب کنید">انتخاب دسته بندی </option>
                                            @if( count($categories)>0)
                                                @foreach($categories as $category)
                                                    <option value={{$category->id}}>{{$category->name}}</option>
                                                    @if (count($category->childrenRecursive))
                                                        @include('adminPanel.layOut.categories.partial.partial-create-categories',["categories"=>$category->childrenRecursive,"level"=>1])
                                                    @endif
                                                @endforeach
                                            @endif

                                        </select>

                                    </div>
                                </div>



                                <div class="w-100">
                                    <h3 class="mb-3">ویژگی های محصول </h3>
                                    <div class="row w-100">

                                        @foreach($attributes as $attribute)
                                            <div class=" col-12 col-md-6 ">
                                            <div class="form-group has-float-label  ">
                                                <label for={{$attribute->name}}>{{$attribute->name}}</label>
                                                <input type="text" class="form-control" id={{$attribute->name}} name={{$attribute->name}}     />
                                            </div>
                                            </div>
                                        @endforeach


                                    </div>

                                </div>





{{--                                <div class="form-group">--}}
{{--                                    <label for="discount_price" class="col-sm-2 control-label"> قیمت با تخفیف  </label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="قیمت با تخفیف">--}}
{{--                                    </div>--}}
{{--                                </div>--}}




                                {{--                                <div class="form-group position-relative error-l-50">--}}
{{--                                    <label for="meta_title">متا تگ :</label>--}}
{{--                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="متا تگ را برای دسته بندی را واد کنید ">--}}
{{--                                    <div class="invalid-tooltip">--}}
{{--                                        نام دسته بندی--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group position-relative error-l-50">--}}
{{--                                    <label for="meta_desc">متا توضیحات :</label>--}}
{{--                                    <input type="text" class="form-control" id="meta_desc" name="meta_desc"  placeholder="متا توضیحات را برای دسته بندی را واد کنید ">--}}
{{--                                    <div class="invalid-tooltip">--}}
{{--                                        نام دسته بندی--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group position-relative error-l-50">--}}
{{--                                    <label  for="meta_keyword">متا کلید واژه :</label>--}}
{{--                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"  placeholder="متا کلید واژه را برای دسته بندی را واد کنید ">--}}
{{--                                    <div class="invalid-tooltip">--}}
{{--                                        نام دسته بندی--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <!-- /.box-body -->
                                <div class="w-100">
                                    <button type="submit" class="btn btn-primary mb-0 mt-3 col-2 text-center" onclick="setPhoto()">ارسال</button>

                                </div>

                                <!-- /.box-footer -->
                            </form>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>

@endsection
@section("js-import")

{{--    <script src={{asset("/admin/DropZone-min/dropzone.min.js")}} type="text/javascript"></script>--}}
{{--    <script src={{asset("/admin/DropZone-min/dropzone-amd-module.min.js")}} type="text/javascript"></script>--}}
    <script>
        {{--var drop=new Dropzone("#photo",{--}}
        {{--    url:"{{route('photo.upload')}}",--}}
        {{--    addRemoveLinks:true,--}}
        {{--    maxFiles:1,--}}
        {{--    sending:function (file,xhr,formDate) {--}}
        {{--        formDate.append("_token","{{csrf_token()}}");--}}
        {{--    },success:function (file,response) {--}}
        {{--        console.log(response.photo_id);--}}
        {{--        document.getElementById("photo_id").value=response.photo_id--}}
        {{--    }--}}
        {{--})--}}

            Dropzone.autoDiscover=false;
        var PhotoGallery=[];

        if ($().dropzone && !$(".dropzone").hasClass("disabled")) {
            $(".dropzone").dropzone({
                url: "{{route('photo.upload')}}",

                sending:function (file,xhr,formDate) {
                    formDate.append("_token","{{csrf_token()}}");
                },

                init: function () {
                    this.on("success", function (file,response) {
                        console.log(response.photo_id);
                        PhotoGallery.push(response.photo_id);
                        // document.getElementById("photo_id").value=response.photo_id

                    });
                },
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "><div class="p-0 w-30 position-relative"><div class="dz-error-mark"><span><i></i></span></div><div class="dz-success-mark"><span><i></i></span></div><div class="preview-container"><img data-dz-thumbnail class="img-thumbnail border-0" /><i class="simple-icon-doc preview-icon" ></i></div></div><div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"><div><span data-dz-name></span></div><div class="text-primary text-extra-small" data-dz-size /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div><a href="#/" class="remove" data-dz-remove><i class="glyph-icon simple-icon-trash"></i></a></div>'
            });
        }










        {{--Dropzone.autoDiscover=false;--}}
        {{--var PhotoGallery=[];--}}
        {{--var drop=new Dropzone("#photo",{--}}
        {{--    url:"{{route('photo.upload')}}",--}}
        {{--    addRemoveLinks:true,--}}
        {{--    // maxFiles:1,--}}
        {{--    sending:function (file,xhr,formDate) {--}}
        {{--        formDate.append("_token","{{csrf_token()}}");--}}
        {{--    },success:function (file,response) {--}}
        {{--        console.log(response.photo_id);--}}
        {{--        // document.getElementById("photo_id").value=response.photo_id--}}
        {{--        PhotoGallery.push(response.photo_id);--}}
        {{--    }--}}

        {{--});--}}

        setPhoto=function(){
            document.getElementById("photo_id").value=PhotoGallery
        };


        // CKEDITOR.replace("description",{
        //     customConfig:"config.js",
        //     toolbar:"simple",
        //     language:"fa"
        //     // removePlugins:""
        // })




    </script>
@endsection
