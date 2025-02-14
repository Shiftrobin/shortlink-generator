<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function faq_category()
    {
        return $this->belongsTo(FaqCategory::class,'faq_category_id','id');
    }
}
