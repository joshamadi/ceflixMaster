<?php

namespace App\Http\Controllers;

use App\Http\Resources\BestCategoryResource;
use App\Model\BestCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BestCategoryController extends Controller
{
    public function index(BestCategory $bestCategory){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  BestCategoryResource::collection($bestCategory->latest()->take($num)->get());

        }else{
            $resource =  BestCategoryResource::collection($bestCategory->latest()->get());
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

    public function store_BestCategory(Request $request, BestCategory $bestCategory){
        $bestCategory->create($request->all());
        return response('BestCategory created', Response::HTTP_OK);
    }

    public function delete(BestCategory $bestCategory){
        $bestCategory->delete();
        return response('BestCategory deleted', Response::HTTP_OK);
    }
}
