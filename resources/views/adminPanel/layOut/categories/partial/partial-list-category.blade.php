
@foreach($categories as $category)
    <div class="card d-flex flex-row mb-3 ml-auto" style="width:calc(100% - {{$level*3}}% )">
        <a class="d-flex" href="Pages.Product.Detail.html">
            <img src="/admin/img/products/fat-rascal-thumb.jpg" alt="Fat Rascal"
                 class="list-thumbnail responsive border-0 card-img-left" />
        </a>
        <div class="pl-2 d-flex flex-grow-1 min-width-zero">
            <div
                class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                <a href="Pages.Product.Detail.html" class="w-40 w-sm-100">
                    <p class="list-item-heading mb-0 truncate">{{$category->name}}</p>
                </a>
                <p class="mb-0 text-muted text-small w-15 w-sm-100">{{$category->parent_id}}</p>
                {{--                                    <p class="mb-0 text-muted text-small w-15 w-sm-100">13.04.2018</p>--}}
                <div class="w-30 w-sm-100">
                    <a href={{route("category.edit", $category->id )}}>   <span class="btn  btn-warning"  onclick="">ویرایش</span></a>
                    <span class="badge badge-pill  badge-danger">حذف</span>
                </div>
            </div>
            {{--                                <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">--}}
            {{--                                    <input type="checkbox" class="custom-control-input">--}}
            {{--                                    <span class="custom-control-label">&nbsp;</span>--}}
            {{--                                </label>--}}
        </div>
    </div>

    @if( count($category->childrenRecursive)>0)
        @include('adminPanel.layOut.categories.partial.partial-list-category',['categories'=>$category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach

