<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromoProduct extends Model
{
    protected $guarded = [];

    protected $dates = ['start_date','end_date'];

    public function product(){
        return $this->belongsTo("App\Model\Product",'product_id','unique_id');
    }
}
