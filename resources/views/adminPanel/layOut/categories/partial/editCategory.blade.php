{{--@foreach($categories as $sub_category)--}}
    {{--<option value={{$sub_category->id}}>{{str_repeat('----',$level)}}{{$sub_category->name}}</option>--}}
    {{--@if( count($sub_category->childrenRecursive)>0)--}}
        {{--@include('admin.partials.createCategories',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])--}}
    {{--@endif--}}
{{--@endforeach--}}
@foreach($categories as $sub_category)
    <option  @if ($sub_category->id==$parent_id) selected @endif   value={{$sub_category->id}}>{{str_repeat('----',$level)}}{{$sub_category->name}}</option>
    @if( count($sub_category->childrenRecursive)>0)
        @include('admin.partials.createCategory',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach
