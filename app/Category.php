<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
    public function product()
    {
//        return $this->hasMany(Category::class);
        return $this->belongsToMany(Product::class);
    }
    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

}
