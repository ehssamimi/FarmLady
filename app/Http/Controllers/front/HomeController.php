<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $lastProducts=Product::with(['categories'=>function($q){
//            $q->where('name','مربا');
//        }])->limit(10)->get();
         $lastProducts=Product::orderBy('created_at','desc')->limit(10)->get();
         $khoshkbar=Product::orderBy('created_at','desc')->limit(10)->get();

         $categoriesList=Category::with('photos')->orderBy('created_at','desc')->limit(4)->get();


        return view('front.home.home',compact(["lastProducts","categoriesList"]));
    }


    public function CategoryInfo($id)
    {
//        $lastProducts=Product::with(['categories'=>function($q){
//            $q->where('name','مربا');
//        }])->limit(10)->get();


//         $Products=Product::with('categories')->paginate(10);
        $MainProducts=Product::with("photos")->findOrFail($id)->paginate(10);




//         $khoshkbar=Product::orderBy('created_at','desc')->limit(10)->get();

        return view('front.home.category.category',compact(["MainProducts"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
