<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function shopping_type(){
        return $this->belongsTo(SaleType::class,'sale_type_id','id');
    }

    public function collection_time(){
        return $this->belongsTo(CollectionTime::class,'collection_time_id','id');
    }
}
