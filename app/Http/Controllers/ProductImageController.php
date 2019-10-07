<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductImageResource;
use App\Model\Product;
use App\Model\ProductImages;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Webpatser\Uuid\Uuid;

class ProductImageController extends Controller
{
    public function index(ProductImages $productImages){
        return ProductImageResource::collection($productImages->latest()->get());
    }

    public function store_productimage(Request $request, Product $product){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $imageName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

        Image::make($request->image)->save(public_path('images/banners/').$imageName)->resize(870, 355);

        return ProductImages::create([
            'unique_id' => Uuid::generate()->string,
            'product_id' => $product->unique_id,
            'path' => $imageName,
        ], Response::HTTP_CREATED);

    }

    public function show_productimage(ProductImages $productImages){
        if (empty($productImages))
            return response('Product Image not found', Response::HTTP_NOT_FOUND);
        else
            return new ProductImageResource($productImages);
    }


    public function update(Request $request, ProductImages $productImages){
        if (empty($productImages))
            return response('Image not found', Response::HTTP_NOT_FOUND);
        else
        $productImages->update($request->all());
        return response('Image has been updated successfully', Response::HTTP_OK);
    }

    public function delete(ProductImages $productImages){
        $productImages->delete();
        return response('Image has been deleted successfully', Response::HTTP_NO_CONTENT);
    }


}
