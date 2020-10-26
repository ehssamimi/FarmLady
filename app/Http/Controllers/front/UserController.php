<?php

namespace App\Http\Controllers\front;

use App\Address;
use App\City;
use App\User;
use App\User_detail;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function UserProfile(Request $request)
    {
        $user=Auth::user();

//        return (view('front.User.userFormProfile'));

        return view('front.User.userFormProfileEdit',compact(['user']));

    }
    public function UserProfileEdit(Request $request)
    {
        $user=Auth::user();

        return view('front.User.userFormProfile',compact(['user']));

    }

    public function store(Request $request)
    {
//        $table->increments('id');
//        $table->string('name');
//        $table->string('email')->unique()->nullable();
//        $table->string('birthday');
//        $table->tinyInteger('gender');
//        $table->string('national_code');
//
//        $table->unsignedInteger('user_id');
//        $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");;

//        $table->text('address');
//        $table->string('company')->nullable();
//        $table->string('post_code');
//
//        $table->unsignedInteger('province_id');
//        $table->foreign('province_id')->references('id')->on('provinces');
//        $table->unsignedInteger('city_id');
//        $table->foreign('city_id')->references('id')->on('cities');
//
//
//        $table->unsignedInteger('user_id');
//        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



        $validator=Validator::make($request->all(),[
            'name'=>'required ',
            'birthday'=>'required ',
            'gender'=>'required ',
            'national_code'=>'required ',
            'address'=>'required ',
            'post_code'=>'required ',
            'province_id'=>'required ',
            'city_id'=>'required ',

        ], [
            'name.required'=>'نام اجباری است ',
            'birthday.required'=>'تاریخ تولد اجباری است ',
            'gender.required'=>'جنسیت اجباری است ',
            'national_code.required'=>'کد ملی اجباری است ',
            'address.required'=>'آدرسس اجباری است ',
            'post_code.required'=>'کد پستی اجباری است ',
            'province_id.required'=>'استان اجباری است ',
            'city_id.required'=>'شهر اجباری است ',

        ]);
        if ($validator->fails()){
            return redirect('user-profile')->withErrors($validator)->withInput();
        }else{
//            dd("validate");

            $User_detail=new UserInfo();
            $User_detail->name=$request->name;
            $User_detail->email=$request->email;
            $User_detail->birthday=$request->birthday;
            $User_detail->gender=$request->gender;
            $User_detail->national_code=$request->national_code;
            $User_detail->user_id=Auth::User()->id;

            $address=new Address();
            $address->company=$request->company;
            $address->post_code=$request->post_code;
            $address->province_id=$request->province_id;
            $address->city_id=$request->city_id;
            $address->address=$request->address;
             $address->user_id=Auth::User()->id;

            $user=User::findOrFail(Auth::User()->id);
            $user->complete='1';



            $User_detail->save();
            $address->save();
            $user->save();


            return redirect('/user-profile-edit');

//            Session::flash('success',   "اطلاعات کاربری با موفقیت به روز رسانی شد");


        }












        $user=Auth::user();
        return($user);

        return ($request->all());
    }


    public function getAllCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->get();


        $response =[
            'cities' => $cities
        ];
        return response()->json($response, 200);
    }


}
