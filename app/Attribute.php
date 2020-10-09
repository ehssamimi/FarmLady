<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function product()
    {
//        return $this->hasMany(Category::class);
        return $this->belongsToMany(Product::class)->withPivot("value");
    }
}
