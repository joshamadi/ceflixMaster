<?php

namespace App;

use App\Model\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','unique_id', 'email','phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store(){
        return $this->hasOne("App\Model\Store",'store_name','name');
    }

    public function Transaction(){
        return $this->hasMany("App\Model\Transaction",'unique_id','unique_id');
    }

    public function wallet(){
        return $this->hasOne("App\Model\Wallet",'unique_id','unique_id');
    }

    public function orders(){
        return $this->hasMany("App\Model\Order",'unique_id','unique_id');
    }
}
