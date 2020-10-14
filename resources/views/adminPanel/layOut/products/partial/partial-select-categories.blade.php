@foreach($categories as $sub_category)
    <option value={{$sub_category->id}}  @foreach($product->categories as $productCat) @if($productCat->name===$sub_category->name)
        selected="selected"   @endIf      @endforeach   >{{str_repeat('----',$level)}}{{$sub_category->name}}</option>
    @if( count($sub_category->childrenRecursive)>0)
        @include('adminPanel.layOut.categories.partial.partial-create-categories',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach
