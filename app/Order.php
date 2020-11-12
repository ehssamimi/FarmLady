<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['address_id', 'delivery_type', 'description'];

    /*
     * Status of orders
     */
    const INITIALING = 1;
    const PREPARING = 2;
    const SENDING = 3;
    const DELIVERED = 4;
    const CANCELED = 5;

    /*
     * Delivery types
     */

    const FREE = 10;
    const CONSTANT = 11;
    const SEPARATED = 12;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function stringStatus()
    {

        switch ($this->status) {
            case self::INITIALING:
                $result = 'ثبت سفارش';
                break;
            case self::PREPARING:
                $result = 'در حال آماده سازی';
                break;
            case self::SENDING:
                $result = 'در حال ارسال';
                break;
            case self::DELIVERED:
                $result = 'تحویل داده شده';
                break;
            case self::CANCELED:
                $result = 'لغو شده';
                break;
            default :
                $result = 'نامشخص';
        }

        return $result;
    }

    public function stringDelivery()
    {
        switch ($this->delivery_type) {
            case self::FREE:
                $result = 'رایگان';
                break;
            case self::CONSTANT:
                $result = 'هزینه ی ثابت - 8000 تومان';
                break;
            case self::SEPARATED:
                $result = 'ارسال هر آیتم به صورت جداگانه - 150000 تومان';
                break;
            default:
                $result = 'نامشخص';
        }

        return $result;
    }

    public function totalPrice()
    {
        $total_price = 0;

        foreach ($this->order_items()->get() as $item) {
            $total_price += $item->product()->first()->price * $item->count;
        }
        return $total_price;
    }


}
