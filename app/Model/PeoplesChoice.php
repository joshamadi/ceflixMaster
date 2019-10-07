<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeoplesChoice extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo("App\Model\Product",'product_id','unique_id');
    }
}
