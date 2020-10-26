<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ActiveCode extends Model
{
    use Notifiable;



    protected $fillable = [
//        'name', 'email', 'password',
        'phone', 'code', 'expired_at',
    ];
//    public $timestamps=false;


    public function scopeGenerateCode($query,$phone)
    {
//        if ($code=$this.getActiveCodeForUser($phone)){
        if ($code=$this->getActiveCodeForUser($phone)){
            $code=$code->code;

        }else{
            do{
                $code=rand(100000,999999);
            }while($this->checkCodeIsUnique($code,$phone));

            $activecode = new ActiveCode();
            $activecode->phone = $phone;
            $activecode->code = $code;
            $activecode->expired_at = now()->addMinute(1);
            $activecode->save();


        }

        return $code;


//        return $query->where('votes', '>', 100);
    }

    private function checkCodeIsUnique(int $code, $phone)
    {
        return !! ActiveCode::where('code',$code)->where('phone',$phone)->first();
    }

    private function getActiveCodeForUser( $phone)
    {
        return   ActiveCode::where('phone',$phone)->where('expired_at','>',now())->first();
    }




    public   function scopeVerificationCod($query,$code, $phone)

    {


        return !! ActiveCode::where('phone',$phone)->where('code',$code)->where('expired_at','>',now())->first();


    }




}
