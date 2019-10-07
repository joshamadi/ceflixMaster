<?php

namespace App\Http\Controllers;

use App\Http\Resources\SponsoredProductResource;
use App\Model\SponsoredProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SponsoredProductController extends Controller
{
    public function index(SponsoredProduct $sponsoredProduct){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  SponsoredProductResource::collection($sponsoredProduct->latest()->take($num)->get());

        }else{
            $resource =  SponsoredProductResource::collection($sponsoredProduct->latest()->get());
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

    public function store_SponsoredProduct(Request $request, SponsoredProduct $sponsoredProduct){
        $sponsoredProduct->create($request->all());
        return response('SponsoredProduct created', Response::HTTP_OK);
    }

    public function delete(SponsoredProduct $sponsoredProduct){
        $sponsoredProduct->delete();
        return response('SponsoredProduct deleted', Response::HTTP_OK);
    }
}
