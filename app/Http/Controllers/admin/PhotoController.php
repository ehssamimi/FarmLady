<?php

namespace App\Http\Controllers\admin;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{


    public function upload(Request $request)

    {
//        dd($request->all());

        $uploadFile = $request->file('file');
        $newFileName=str_replace(" ","",$uploadFile->getClientOriginalName());


//        $filename = time();
        $filename = time() . $newFileName;
//        $filename = time() . $uploadFile->getClientOriginalName();
        $original_name = $uploadFile->getClientOriginalName();

//        $filename = time() .$newFileName;
//        $original_name = $newFileName;


//
        Storage::disk('local')->putFileAs('public/photos/' , $uploadFile, $filename);
        $photo = new Photo();
        $photo->original_name = $filename;
        $photo->path = $filename;
//        $photo->user_id = Auth::user()->id;
//                dd($photo);
        $photo->save();
        return response()->json([
            'photo_id' => $photo->id
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
