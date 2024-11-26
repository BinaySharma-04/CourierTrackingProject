<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $table="curiers";
    protected $fillable = [
         	'name',	'address',	'destination',	'r_name'	,'r_email'	,'r_phone'	,'r_address','status','order_id',	'weight',	'dimension'	,'package',	'message',
    ];
}


