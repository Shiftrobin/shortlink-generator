<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function brand(){
        return $this->hasMany(ProductBrand::class,'product_id','id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'vendor_id','id');
    }

    public function product_img(){
    	return $this->hasMany(ProductSubImage::class,'product_id','id');
    }
}
