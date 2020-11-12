<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id'];

    /*
     * Types of payment methods
     */
    const ONLINE = 1;
    const OFFLINE = 2;


    /*
     * Types of payment status
     */
    const PAID = 4;
    const PENDING = 5;
    const FAILURE = 6;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function stringStatus()
    {
        switch ($this->status) {
            case self::PAID:
                $result = 'پرداخت شده';
                break;
            case self::PENDING:
                $result = 'در انتظار پرداخت';
                break;
            case self::FAILURE:
                $result = 'پرداخت ناموفق';
                break;
            default :
                $result = 'نامشخص';
        }

        return $result;
    }

    public function stringMethod()
    {
        switch ($this->method) {
            case self::ONLINE:
                $result = 'آنلاین';
                break;
            case self::OFFLINE:
                $result = 'پرداخت در محل';
                break;
            default :
                $result = 'نامشخص';
        }

        return $result;
    }

}
