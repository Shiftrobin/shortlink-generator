<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'image',
        'email',
        'mobile',
        'company_logo',
        'mobile2',
        'facebook_link',
        'twitter_link',
        'whatsapp_link',
        'linkedin_link',
        'instagram_link',
        'youtube_link',
        'messenger_link',
        'fathers_name',
        'mothers_name',
        'date_of_birth',
        'nid',
        'gender',
        'blood_group',
        'education_qualification',
        'profession',
        'other_expertise',
        'country_id',
        'division_id',
        'district_id',
        'upazila_id',
        'union_id',
        'address',
        'membership_type',
        'member_id',
        'payment_id',
        'username',
        'password',
        'usertype',
        'role',
        'role_id',
        'email_verified_at',
        'code',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }

    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
}
