@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"attributes","sub"=>"list-attributes"])
@section("content")
    <main>
        <div class="container-fluid">
            @include('adminPanel.master.partial.Header',["main"=>"لیست ویژگی ها" ])

            <div class="row">
                <div class="col-12 list" data-check-all="checkAll">
{{--                    @foreach($attributes as $attribute)--}}
{{--                        <div class="card d-flex flex-row mb-3">--}}
{{--                            <a class="d-flex" href="Pages.Product.Detail.html">--}}
{{--                                <img src="/admin/img/products/fat-rascal-thumb.jpg" alt="Fat Rascal"--}}
{{--                                     class="list-thumbnail responsive border-0 card-img-left" />--}}
{{--                            </a>--}}
{{--                            <div class="pl-2 d-flex flex-grow-1 min-width-zero">--}}
{{--                                <div--}}
{{--                                    class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">--}}
{{--                                    <a href="Pages.Product.Detail.html" class="w-40 w-sm-100">--}}
{{--                                        <p class="list-item-heading mb-0 truncate">{{$category->name}}</p>--}}
{{--                                    </a>--}}
{{--                                    <p class="mb-0 text-muted text-small w-15 w-sm-100">{{$category->parent}}</p>--}}
{{--                                    <p class="mb-0 text-muted text-small w-15 w-sm-100">13.04.2018</p>--}}
{{--                                    <div class="w-30 w-sm-100">--}}
{{--                                        <a href={{route("category.edit", $category->id )}}>   <span class="btn  btn-warning"  onclick="">ویرایش</span></a>--}}

{{--                                        <span class="badge badge-pill  badge-danger">حذف</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Striped Rows</h5>

                                        <table class="table table-striped">
                                            <thead>

                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-center">نام </th>
                                                <th scope="col"  class="text-center">ویرایش </th>
                                                <th scope="col"  class="text-center">حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($attributes as $attribute)
                                            <tr>
                                                <th scope="row">{{$attribute->id}}</th>
                                                <td>{{$attribute->name}}</td>
                                                <td  class="text-center" ><a href={{route("attribute.edit", $attribute->id )}}>   <span class="btn  btn-warning text-center"   >ویرایش</span></a></td>
                                                <td  class="text-center" ><a href={{route("attribute.destroy", $attribute->id )}}>   <span class="btn  btn-danger text-center"  >حذف</span></a></td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


{{--                    @endforeach--}}


{{--                    <nav class="mt-4 mb-3 d-flex justify-content-center">--}}
{{--                        {{$attributes->links()}}--}}
{{--                    </nav>--}}

                </div>
            </div>


        </div>
    </main>

@endsection
