<?php

namespace App\Http\Controllers;

use App\Http\Resources\RelatedProductResource;
use App\Model\Product;
use App\Model\RelatedProduct;
use Illuminate\Http\Request;

class RelatedProductController extends Controller
{
    public function related_products(){
        $relatedProducts = Product::get();

        foreach ($relatedProducts as $relatedProduct){
            $products = Product::where('category_id', $relatedProduct->category_id)
                ->Orwhere('store_id', $relatedProduct->store_id)->get();
        }

        if(isset($_GET['num'])){
            $num = $_GET['num'];

//            $resource =  $products->take($num);

            $resource =  RelatedProductResource::collection($products->take($num));

        }else{
//            $resource =  $products;

            $resource =  RelatedProductResource::collection($products);
        }

        if($resource->count() > 0)
            return response()->json([
                'status'=> true,
                'message'=>'data returned',
                'data'=> $resource
            ]);
        else
            return response()->json([
                'status'=> false,
                'message'=>'No data returned',
            ]);

    }
}
