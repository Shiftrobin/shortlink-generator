<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryUserModel extends Model
{

    use HasFactory;

    protected $table = 'temporary_users';
    protected $fillable = [
        'first_name','last_name', 'name', 'image', 'email', 'mobile', 'fathers_name',
        'mothers_name', 'date_of_birth', 'nid', 'gender', 'blood_group', 'education_qualification', 'profession',
        'other_expertise', 'country_id', 'division_id', 'district_id', 'upazila_id', 'union_id', 'address', 'membership_type',
        'member_id', 'payment_id','username', 'password', 'usertype', 'role', 'role_id', 'email_verified_at', 'code', 'status',
      ];	
	
}
