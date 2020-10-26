<?php

namespace App\Http\Controllers\Auth;

use App\ActiveCode;
use App\Http\Controllers\Controller;
use App\Notifications\ActiveCodeNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;
//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }


    public function showLogin()
    {
        return view("front.Login.login");
//        return view("front.User.userFormProfile");

    }


    public function verifyCode(Request $request)
    {
        $validData = $request->validate([
//            'name' => ['required' , 'string' , 'max:255' , 'min:3'],
//            'phone' => ['required' , 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/' ,'unique:users,phone']
            'phone' => ['required' , 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/']
        ],[

            'phone.required' => "شماره تلفن اجباری است ",
            'phone.regex' => "نوع شماره تلفن مناسب نیست ",
        ]);
//        return  $validData;
        $code=ActiveCode::generateCode($request->phone);
//        dd($code);
        $request->session()->flash('phone',$request->phone);
//        $activecode=new ActiveCode();

//        $activecode->notify(new ActiveCodeNotification($code,$request->phone));
        return redirect(route('validate.show'));





//        $activecode=new ActiveCode();
//        $activecode->phone=$request->phone;
//        $activecode->code=1111;
//        $activecode->expired_at=now()->addMinute(10);
//        $activecode->save();
//        return  (view('front.Login.verifyCode'));



//        return $request->all();

    }



    public function checkCode(Request $request)
    {
        $validData = $request->validate([

            'Inputcode' => ['required']
        ],[

            'Inputcode.required' => "کداجباری است ",

        ]);

        if (!$request->session()->has('phone')) {

            return redirect(route('login'));
        }
        $request->session()->reflash();

//        *****check verify cod*****
        $status=ActiveCode::verificationCod( (int)$request->Inputcode,$request->session()->get('phone'));


        if ($status){
//        *****remove  old cods*****
           $ids= ActiveCode::where('phone',$request->session()->get('phone'))->get(['id']);
            ActiveCode::whereIn('id',$ids)->delete();



 //        *****check user if exist or create*****
            $IsUser=User::isUser($request->session()->get('phone'));


            if ( $IsUser ){
                $user=User::where('phone',$request->session()->get('phone'))->first();
//                return($user);
                Auth::login($user);
                if ($user->complete==0){

                    return redirect(route('user-profile'));
                }else{

                    return redirect(route('/'));
                }

            }else{
                $user=new User();
                $user->phone=$request->session()->get('phone');
                $user->save();
                Auth::login($user);
                return redirect(route('user-profile-edit'));


            }


        }else{
            return redirect('check-code')->withErrors([ 'کد ارسالی اشتباه است'])->withInput();
//            dd("کد اشتباه است ");
        }


    }


    public function showCode(Request $request)
    {


        if (!$request->session()->has('phone')) {

            return redirect(route('login'));
        }

        $request->session()->reflash();
        return (view('front.Login.verifyCode'));


    }










}
