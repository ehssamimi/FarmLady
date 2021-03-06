<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with(["childrenRecursive","photos"])->where("parent_id",null)->paginate(10);

        return (view("adminPanel.layOut.categories.list-categories",compact(["categories"])));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::with("childrenRecursive")->where("parent_id",null)->get();
        return (view("adminPanel.layOut.categories.create-categories",compact(["categories"])));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
//        return $request->all();

        $category=new Category();
        $category->name=$request->name;
        $category->meta_title=$request->meta_title;
        $category->meta_desc=$request->meta_desc;
        $category->meta_keyword=$request->meta_keyword;
        if ($request->parent_id=="تگ پدر را انتخاب کنید"){
            $category->parent_id=null;
        }else{
             $category->parent_id=$request->parent_id;
        }
        $category->save();
         $category->photos()->sync($request->input('photo_id'));
        return redirect('/administrator/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     $category=Category::with("photos")->findOrFail($id);
     $categories=Category::with("childrenRecursive")->where("parent_id",null)->get();



     return view("adminPanel.layOut.categories.edit-categories",compact(["category","categories"]));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->meta_title=$request->meta_title;
        $category->meta_desc=$request->meta_desc;
        $category->meta_keyword=$request->meta_keyword;
        if ($request->parent_id=="تگ پدر را انتخاب کنید"){
            $category->parent_id=null;
        }else{
            $category->parent_id=$request->parent_id;
        }
        $category->save();
        $category->photos()->sync($request->input('photo_id'));
        return redirect('/administrator/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::with("childrenRecursive")->where("id", $id)->first();
        if (count($category->childrenRecursive) > 0) {
            Session::flash('error_DeleteCategory','دسته بندی ' . $category->name.' به خاطر داشتن زیر دسته قابل حذف نیست ');
        } else {
            $category->delete();
            Session::flash('success_DeleteCategory', 'دسته بندی'.$category->name."حذف شد ");

        }
        return redirect('/administrator/category');
    }
}
