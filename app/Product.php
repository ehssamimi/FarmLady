<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot("value");
    }

    public function categories()
    {
//        return $this->belongsTo(Category::class);
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
