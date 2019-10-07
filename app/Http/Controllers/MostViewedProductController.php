<?php

namespace App\Http\Controllers;

use App\Http\Resources\MostViewedProductResource;
use App\Model\MostView;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MostViewedProductController extends Controller
{
    public function index(MostView $mostView){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  MostViewedProductResource::collection($mostView->latest('views')->take($num)->get());

        }else{
            $resource =  MostViewedProductResource::collection($mostView->latest('views')->get());
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

    public function store_MostView(Request $request, MostView $mostView){
        $mostView->create($request->all());
        return response('MostView created', Response::HTTP_OK);
    }

    public function delete(MostView $mostView){
        $mostView->delete();
        return response('MostView deleted', Response::HTTP_OK);
    }
}
