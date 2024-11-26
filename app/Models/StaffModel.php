<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class StaffModel extends Authenticatable
{
    protected  $table ="staffs";
    protected $fillable = ['name',	'address','email','password','phone_num',	
];
}
