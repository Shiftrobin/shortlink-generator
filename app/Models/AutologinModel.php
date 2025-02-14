<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutologinModel extends Model
{
    use HasFactory;

    protected $table = 'autologins';
    protected $guarded = [];
}
