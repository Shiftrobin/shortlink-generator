<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'amount',

        'address',
        'status',
        'transaction_id',
        'currency',

        'first_name',
        'last_name',        
        'image',      
        'date_of_birth',

        'nid',
        'gender',
        'blood_group',
        'education_qualification',
        'profession',
        'other_expertise',

        'country',
        'division',
        'district',	
        'membership_type'

    ];

    public function payment(){
    	return $this->belongsTo(Payment::class,'payment_id','id');
    }

    public function shipping(){
    	return $this->belongsTo(Shipping::class,'shipping_id','id');
    }

    public function order_details(){
    	return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function customer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
