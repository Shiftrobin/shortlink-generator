<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function reviewer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
