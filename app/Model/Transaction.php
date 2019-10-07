<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected  $guarded = [];

    public function user(){
        return $this->belongsTo("App\User",'user_id','unique_id');
    }

    public function order(){
        return $this->hasOne("App\Model\Order",'order_id','unique_id');
    }


}
