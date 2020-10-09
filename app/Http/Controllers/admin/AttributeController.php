<?php

namespace App\Http\Controllers\admin;

use App\Attribute;
use App\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $attributes=Attribute::all() ;
//       dd($attributes);
//        return (view("adminPanel.layOut.attributes.create-attributes" ,compact(["attributes"]) ;

//
//        $attributes=Attribute::all()->paginate(5);
//
        return (view("adminPanel.layOut.attributes.list-attributes",compact(["attributes"])));
//        return (view("adminPanel.layOut.attributes.list-attributes" ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view("adminPanel.layOut.attributes.create-attributes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:attributes'
        ], ['name.required' => "نام اجباری است ",
            "name.unique"=>"این ویژگی قبلا ثبت شده است  ",
            ]);
        if ($validator->fails()){
            return redirect('administrator/attribute/create')->withErrors($validator)->withInput();
        }else{
         $attribute=new Attribute();
            $attribute->name=$request->input("name");
            $attribute->save();
            return redirect('/administrator/attribute') ;
        }


//         return $request->all();

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
        $attribute = Attribute::whereId($id)->first();

        return view('adminPanel.layOut.attributes.edit-attributes', compact(['attribute']));
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


        $validator=Validator::make($request->all(),[
            "name"=>'required|unique:attributes,name,'.$id,
         ], ['name.required' => "نام اجباری است ",
            "name.unique"=>"این ویژگی قبلا ثبت شده است  ",
        ]);
        if ($validator->fails()){
            return redirect('administrator/attribute')->withErrors($validator)->withInput();
        }else{
            $attribute=Attribute::findOrFail($id);
            $attribute->name=$request->name;
            $attribute->save();
            return redirect('/administrator/attribute');
//            return redirect('/administrator/attribute');
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
        //
    }
}
