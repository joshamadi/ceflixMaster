<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute(){
        return asset("api/product/$this->slug");
    }

    public function category(){
        return $this->belongsTo("App\Model\Category",'category_id','unique_id');
    }

    public function store(){
        return $this->belongsTo("App\Model\Store",'store_id','unique_id');
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->title
        );
    }





}
