<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeaturedProductResource;
use App\Model\FeaturedProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturedProductController extends Controller
{
    public function index(FeaturedProduct $featuredProduct){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  FeaturedProductResource::collection($featuredProduct->latest()->take($num)->get());

        }else{
            $resource =  FeaturedProductResource::collection($featuredProduct->latest()->get());
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

    public function store_FeaturedProduct(Request $request, FeaturedProduct $featuredProduct){
        $featuredProduct->create($request->all());
        return response('FeaturedProduct created', Response::HTTP_OK);
    }

    public function delete(FeaturedProduct $featuredProduct){
        $featuredProduct->delete();
        return response('FeaturedProduct deleted', Response::HTTP_OK);
    }
}
