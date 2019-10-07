<?php

namespace App\Http\Controllers;


use App\Model\Category;
use App\Model\Product;
use App\Model\Store;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
 //------------------->>>>>>>>>>>>>>>>>>>>>>>>>>-10001-<<<<<<<<<<<<<<<<<<<<<<<<<<-----------------------//

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Product::class, 'title')
            ->registerModel(Category::class, 'name')
            ->registerModel(Store::class, 'name')
            ->perform($request->input('query'));

        return $searchResults;
    }

}
