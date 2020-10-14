<?php

namespace App\Http\Controllers\admin;

use App\Attribute;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with(["photos","categories","attributes"])->paginate(10);
//        return $products;


        return (view("adminPanel.layOut.products.list-products",compact(["products"])));
//        return (view("adminPanel.layOut.products.list-products"))


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categories=Category::with("childrenRecursive")->where("parent_id",null)->get();
        $attributes=Attribute::all();
        return (view("adminPanel.layOut.products.create-products",compact(["categories","attributes"])));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function generateSKU()
    {
        $number = mt_rand(1000, 99999);
        if($this->checkSKU($number)){
            return $this->generateSKU();
        }
        return (string)$number;
    }

    public function checkSKU($number)
    {
        return Product::where('sku', $number)->exists();
    }
    function makeSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }
    public function store(Request $request)
    {
//        return $request->all();




        $validator=Validator::make($request->all(),[
            'title'=>'required ',
            'slug'=>'required ',
            'price'=>'required ',
            'count'=>'required ',
            'photo_id'=>'required ',
            'status'=>'required ',

        ], [

            'title.required' => "نام اجباری است ",
            'slug.required' => "نام اجباری است ",
            'price.required' => "قیمت اجباری است ",
            'count.required' => "تعداد اجباری است ",
            'photo_id.required' => "عکس اجباری است ",
            'status.required' => "وضعیت اجباری است ",

        ]);
        if ($validator->fails()){
            return redirect('administrator/product/create')->withErrors($validator)->withInput();
        }else{
            $newProduct = new Product();
            $newProduct->title = $request->title;
            $newProduct->sku = $this->generateSKU();
            $newProduct->slug = $this->makeSlug($request->slug);
            $newProduct->status = $request->status;
            $newProduct->price = $request->price;
            $newProduct->discount_price = $request->discount_price;
            $newProduct->description = $request->description;
            $newProduct->count = $request->count;
//            $newProduct->brand_id = $request->brand;
//            $newProduct->meta_desc = $request->meta_desc;
//            $newProduct->meta_title = $request->meta_title;
//            $newProduct->meta_keywords = $request->meta_keywords;
//            $newProduct->user_id = 1;

            $newProduct->save();


            $photos = explode(',', $request->input('photo_id')[0]);

            $newProduct->categories()->sync($request->categories);

            $newProduct->photos()->sync($photos);

            $attributes=Attribute::all() ;
            foreach ($attributes as $attribute) {
                if ( $request->input($attribute->name)!==null){
                    $newProduct->attributes()->attach($attribute->id, ['value' => $request->input($attribute->name) ]);

                }
            }
            return redirect('/administrator/product');



        }
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
        $product=Product::with(["photos","categories","attributes"])->whereId($id)->first();
        $categories=Category::with("childrenRecursive")->where("parent_id",null)->get();
        $attributes=Attribute::all();
//        return $product;



        return (view("adminPanel.layOut.products.edit-products",compact(["product","categories","attributes"])));
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
//        return $request->all();


        $validator=Validator::make($request->all(),[
            'title'=>'required ',
            'slug'=>'required ',
            'price'=>'required ',
            'count'=>'required ',
            'photo_id'=>'required ',
            'status'=>'required ',

        ], [

            'title.required' => "نام اجباری است ",
            'slug.required' => "نام اجباری است ",
            'price.required' => "قیمت اجباری است ",
            'count.required' => "تعداد اجباری است ",
            'photo_id.required' => "عکس اجباری است ",
            'status.required' => "وضعیت اجباری است ",

        ]);
        if ($validator->fails()){
            return redirect('administrator/product/create')->withErrors($validator)->withInput();
        }else{
             $newProduct = Product::findOrFail($id);;
            $newProduct->title = $request->title;
            $newProduct->sku = $this->generateSKU();
            $newProduct->slug = $this->makeSlug($request->slug);
            $newProduct->status = $request->status;
            $newProduct->price = $request->price;
            $newProduct->discount_price = $request->discount_price;
            $newProduct->description = $request->description;
            $newProduct->count = $request->count;
//            $newProduct->brand_id = $request->brand;
//            $newProduct->meta_desc = $request->meta_desc;
//            $newProduct->meta_title = $request->meta_title;
//            $newProduct->meta_keywords = $request->meta_keywords;
//            $newProduct->user_id = 1;

            $newProduct->save();


            $photos = explode(',', $request->input('photo_id')[0]);

            $newProduct->categories()->sync($request->categories);

            $newProduct->photos()->sync($photos);

            $attributes=Attribute::all() ;
            foreach ($attributes as $attribute) {
                if ( $request->input($attribute->name)!==null){
                    $newProduct->attributes()->attach($attribute->id, ['value' => $request->input($attribute->name) ]);

                }
            }
            Session::flash('success_DeleteCategory', 'محصول '.$newProduct->title."با موفقیت به روز رسانی شد");
            return redirect('/administrator/product');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with("photos")->where("id", $id)->first();
//        if (count($category->childrenRecursive) > 0) {
//            Session::flash('error_DeleteCategory','دسته بندی ' . $category->name.' به خاطر داشتن زیر دسته قابل حذف نیست ');
//        } else {
//            $category->delete();
//            Session::flash('success_DeleteCategory', 'دسته بندی'.$category->name."حذف شد ");
//
//        }
        Session::flash('success_DeleteCategory', 'محصول '.$product->title."حذف شد ");
        $product->delete();
        return redirect('/administrator/product');
    }
}
