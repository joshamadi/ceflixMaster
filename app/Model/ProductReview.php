<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function user(){
        return $this->belongsTo("App\User",'user_id','unique_id');
    }

    public function product(){
        return $this->belongsTo("App\Model\Product",'product_id','unique_id');
    }
}
