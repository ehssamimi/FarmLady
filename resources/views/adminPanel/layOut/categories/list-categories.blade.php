@extends("adminPanel.master.master")

@include('adminPanel.master.partial.menu',["main"=>"categories","sub"=>"list-categories"])
@section("content")
    <main>
        <div class="container-fluid">
            @if(Session::has('error_DeleteCategory'))
                <div class="alert alert-danger">
                    {{Session('error_DeleteCategory')}}
                </div>
            @endif
            @if(Session::has('success_DeleteCategory'))
                <div class="alert alert-success">
                    {{Session('success_DeleteCategory')}}
                </div>
            @endif




            @include('adminPanel.master.partial.Header',["main"=>"لیست دسته بندی ها" ])

            <div class="row">
                <div class="col-12 list" data-check-all="checkAll">
                    @foreach($categories as $category)
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex" href="Pages.Product.Detail.html">
                                <img src="{{$category->photos[0]->path}}" alt="s"
                                     class="list-thumbnail responsive border-0 card-img-left" />
                            </a>
                            <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="Pages.Product.Detail.html" class="w-40 w-sm-100">
                                        <p class="list-item-heading mb-0 truncate">{{$category->name}}</p>
                                    </a>
                                    <p class="mb-0 text-muted text-small w-15 w-sm-100">{{$category->parent}}</p>
{{--                                    <p class="mb-0 text-muted text-small w-15 w-sm-100">13.04.2018</p>--}}
                                    <div class="w-30 w-sm-100 d-flex">
                                        <a href={{route("category.edit", $category->id )}}>   <span class="btn  btn-warning"  onclick="">ویرایش</span></a>

                                        <form method="post" action={{route("category.destroy",$category->id)}}  =>
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger ">حذف</button>
                                        </form>
                                    </div>
                                </div>
{{--                                <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">--}}
{{--                                    <input type="checkbox" class="custom-control-input">--}}
{{--                                    <span class="custom-control-label">&nbsp;</span>--}}
{{--                                </label>--}}
                            </div>
                        </div>

                        @if( count($category->childrenRecursive)>0)
                            @include('adminPanel.layOut.categories.partial.partial-list-category',['categories'=>$category->childrenRecursive,'level'=>1])
                        @endif
                    @endforeach


                    <nav class="mt-4 mb-3 d-flex justify-content-center">
                        {{$categories->links()}}
                    </nav>

                </div>
            </div>


        </div>
    </main>

@endsection
