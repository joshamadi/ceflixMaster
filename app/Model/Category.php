<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute(){
        return asset("api/category/$this->slug");
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->name
        );
    }

}
