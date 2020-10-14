@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"products","sub"=>"create-products"])


@section("css-import")
    <link rel="stylesheet" href={{asset("/admin/DropZone-min/basic.min.css")}}>
    <link rel="stylesheet" href={{asset("/admin/DropZone-min/dropzone.min.css")}}>

@endsection
@section("content")
    <main>
        <div class="container-fluid">
            @include('adminPanel.master.partial.Header',["main"=>"ایجاد محصول" ])

            <div class="row">
                <div class="col-12   mb-5">

                    <div class="card mb-4">
                        <div class="card-body">

                            <form class="  w-100 row m-0" method="post"  action={{route('product.update', $product->id)}} >
                                @csrf
                                <input type="hidden" name="_method" value="PUT">


                                <div class=" col-12 col-md-6">
                                    <div class="form-group has-float-label">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="نام محصول را واد کنید " value={{$product->title}}   />
                                        <span  >نام</span>
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
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="نام مستعار را واد کنید " value={{$product->slug}}   />
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
                                        <input type="text" class="form-control" id="price" name="price" placeholder="قیمت را واد کنید "  value={{$product->price}}  />

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
                                        <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="قیمت با تخفیف را واد کنید "  @if($product->discount_price===null)   value=" " @else  value={{$product->discount_price}} @endif   />

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
                                        <input type="text" class="form-control" id="count" name="count" placeholder="تعداد محصول را واد کنید " value={{$product->count}}   />

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
                                            <input type="radio" value="0" name="status"  style="vertical-align: text-top" @if($product->status===0) checked @endif ><span>فعال</span>
                                            <input type="radio" value="1" name="status" style="vertical-align: text-top" @if($product->status===1) checked @endif><span>غیر فعال</span>
                                        </div>
                                    </div>
                                </div>



                                <div class=" col-12  ">
                                    <div class="form-group has-float-label   ">
                                        <label for="description">  توضیحات محصول </label>
                                        <textarea   row="4" class="form-control ckeditor" id="description" name="description" placeholder="توضیحات"  >
                                            {{$product->description}}
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
                                        <label for="dropzone" class="col-sm-2 control-label">عکس</label>
                                        <div class=" dropzone col-sm-10 m-2" id="photo" ></div>
                                        <input type="hidden" class="form-control" id="photo_id" name="photo_id[]" >
                                        <div class="row m-0">
                                            @foreach($product->photos as $photo)
                                                <div class="col-3 position-relative" id="upload_photo_{{$photo->id}}">
{{--                                                    <img   style="object-fit: inherit" src={{ str_replace(" ","",$photo->path)}}   >--}}
                                                    <img style="object-fit: inherit;width: 100%" src={{ $photo->path}}   >
                                                    <div class=" position-absolute   rounded bg-danger p-2 text-white" style="top: 0; left: 0"
                                                         onclick="removeImg({{$photo->id}})">

{{--                                                         onclick="removeImg([].concat({{$product->photos->pluck("id")}}))">--}}
                                                         حذف
                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>


                                    </div>
                                </div>




                                <div class=" col-12 col-md-6">
                                    <div class="form-group      ">
                                        <label for="categories"  >دسته بندی</label>
                                        {{--                                    <select class="form-control select2-single" name="parent_id" data-width="100%">--}}

                                        <select class="form-control select2-multiple w-100" multiple="multiple" data-width="100%" name="categories[]">
                                            <option value="دسته بندی را انتخاب کنید">انتخاب دسته بندی </option>
                                            @if( count($categories)>0)
                                                @foreach($categories as $category)
                                                    <option value={{$category->id}} @foreach($product->categories as $productCat) @if($productCat->name===$category->name)
                                                        selected="selected"   @endIf      @endforeach>{{$category->name}}</option>
                                                    @if (count($category->childrenRecursive))
                                                        @include('adminPanel.layOut.products.partial.partial-select-categories',["categories"=>$category->childrenRecursive,"level"=>1,"$product"=>$product])
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
                                                    <input type="text" class="form-control"
                                                           id={{$attribute->name}} name={{$attribute->name}}  @foreach($product->attributes as $productAtt) @if($productAtt->name===$attribute->name)
                                                               value={{$productAtt->pivot->value}}    @endIf      @endforeach />
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>

                                </div>



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

    <script src={{asset("/admin/DropZone-min/dropzone.min.js")}} type="text/javascript"></script>
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
            var photos=[].concat({{$product->photos->pluck("id")}})
            {{--var photos={{$product->photos}}--}}

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



        {{--    var drop=new Dropzone("#photo",{--}}
        {{--    url:"{{route('photo.upload')}}",--}}
        {{--    addRemoveLinks:true,--}}
        {{--    // maxFiles:1,--}}
        {{--    sending:function (file,xhr,formDate) {--}}
        {{--        formDate.append("_token","{{csrf_token()}}");--}}
        {{--    },success:function (file,response) {--}}
        {{--        console.log(response.photo_id);--}}
        {{--        console.log(photos);--}}
        {{--        // document.getElementById("photo_id").value=response.photo_id--}}
        {{--        PhotoGallery.push(response.photo_id);--}}
        {{--    }--}}

        {{--});--}}

        setPhoto=function( ){
            document.getElementById("photo_id").value=PhotoGallery.concat(photos)
        };
        removeImg=function (id) {
            console.log(id)
             var index=photos.indexOf(id);
            photos.splice(index,1);
            console.log(photos)
            document.getElementById('upload_photo_' + id ).remove()
            {{--console.log({{$product->photos}})--}}
        }


        // CKEDITOR.replace("description",{
        //     customConfig:"config.js",
        //     toolbar:"simple",
        //     language:"fa"
        //     // removePlugins:""
        // })




    </script>
@endsection
