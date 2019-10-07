<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo("App\User",'user_id','unique_id');
    }

    public function product(){
        return$this->hasMany("App\Model\Product",'product_id','unique_id');
    }
}
