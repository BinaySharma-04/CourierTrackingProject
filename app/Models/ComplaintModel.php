<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintModel extends Model
{
    //
protected $table ="complaints";
  
protected $fillable = [ 'name' ,'email' ,'phone', 'msg',];

}
