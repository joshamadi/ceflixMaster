<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductReviewResource;
use App\Model\ProductReview;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductReviewController extends Controller
{
    public function product_reviews(ProductReview $productReview){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  ProductReviewResource::collection($productReview->latest()->take($num)->get());

        }else{
            $resource =  ProductReviewResource::collection($productReview->latest()->get());
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


    public function store_product_review(Request $request, ProductReview $productReview){

        $productReview->create($request->all());

        return response('product reviews created', Response::HTTP_CREATED);
    }


    public function show_product_review(ProductReview $productReview){

        if (empty($productReview))
            return response('Product review not found', Response::HTTP_NOT_FOUND);
        else
            return new ProductReviewResource($productReview);


    }


    public function delete(ProductReview $productReview){
        $productReview->delete();
        return response('Product review has been deleted', Response::HTTP_OK);
    }
}
