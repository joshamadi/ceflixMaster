<?php

namespace App\Http\Controllers;

use App\Http\Resources\PromoProductResource;
use App\Model\PromoProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromoProductController extends Controller
{
    public function index(PromoProduct $promoProduct)
    {

        $time = PromoProduct::first();

        $start_date = strtotime($time->start_date);
        $end_date = strtotime($time->end_date);

        if ($start_date < $end_date) {

            if (isset($_GET['num'])) {
                $num = $_GET['num'];

                $resource = PromoProductResource::collection($promoProduct->latest()->take($num)->get());

            } else {
                $resource = PromoProductResource::collection($promoProduct->latest()->get());
            }

            if ($resource->count() > 0)
                return response()->json([
                    'status' => true,
                    'message' => 'data returned',
                    'data' => $resource
                ]);
            else
                return response()->json([
                    'status' => false,
                    'message' => 'No data returned',
                ]);

        } else {

            return "Promo product has expired";

        }

    }


    public function check_product_promo_date(){
        $exp_date = date('2019-09-23 00:00:00');
        $today_date = date('Y-m-d H:i:s');

        $exp = strtotime($exp_date);
        $today = strtotime($today_date);

//        dd($exp);

        if($today > $exp)
            return "Promo product has expired";
        else
            return "DONT MISS YOUR CHANCE,ONLY 200 PROMO CODES ON DISCOUNT!";
    }

    public function store_PromoProduct(Request $request){
//        $promoProduct->create($request->all());
        $promoProduct = new PromoProduct();
        $promoProduct->product_id = $request->product_id;
        $promoProduct->start_date = $request->start_date;
        $promoProduct->end_date   = $request->end_date;
        $promoProduct->save();
        return response('Promo product created', Response::HTTP_OK);
    }

    public function delete(PromoProduct $promoProduct){
        $promoProduct->delete();
        return response('Promo product deleted', Response::HTTP_OK);
    }
}
