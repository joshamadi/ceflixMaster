<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Webpatser\Uuid\Uuid;

class ProductController extends Controller
{
    public function index(Product $product){

        if(isset($_GET['num'])){
            $num =$_GET['num'];

            //$resource =  Product::take($num)->get();
            $resource =  ProductResource::collection($product->take($num)->get());

        }else{
            $resource =  ProductResource::collection($product->latest()->get());

        }

        if($resource->count() > 0)
            return response()->json([
                'status'=> true,
                'message'=>'data returned',
                'data'=> $resource
            ]);
        else
            return array('status'=> false,'message'=>'No data returned');

        // return ProductResource::collection($product->latest()->get());
    }

    public function store_product(Request $request, Product $product){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $imageName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

        Image::make($request->image)->save(public_path('images/').$imageName)->resize(200, 200);

        $data = array(
            'category_id' => $request->category_id,
            'store_id' => $request->store_id,
            'unique_id' => Uuid::generate()->string,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'status' => $request->status,
            'image' => $imageName
        );


        Product::create($data);


        return response('Product has been created', Response::HTTP_CREATED);
    }


    public function show_product(Product $product){
        if (empty($product))
            return response('Product not found', Response::HTTP_NOT_FOUND);
        else
        return new ProductResource($product);
    }


    public function update(Request $request, Product $product){
        if (empty($product))
            return response('Product not found', Response::HTTP_NOT_FOUND);
        else
        $product->update($request->all());
        return response('Product has been updated', Response::HTTP_OK);
    }

    public function delete(Product $product){
        $product->delete();
        return response('Product has been deleted', Response::HTTP_NO_CONTENT);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        $request->session()->put('cart', $cart);

//        dd($request->session()->get('cart'));

        return response('Added a product', Response::HTTP_OK);
    }

    public function  getCart(){
        if (!Session::get('cart')){
            return response('No cart available',Response::HTTP_NOT_FOUND);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return response(['products' => $cart->items, 'total_price' => $cart->totalPrice]);
    }

    public function MostViewed(){

        return 'its working';

    }




}
