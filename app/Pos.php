<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    protected $fillable = ['pro_id','pro_name','pro_quantity','product_price','sub_total'];
}
