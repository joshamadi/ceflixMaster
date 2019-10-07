<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use App\Model\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Webpatser\Uuid\Uuid;

class StoreController extends Controller
{
    public function index(Store $store){
        return StoreResource::collection($store->latest()->get());
    }

    public function create_store(Request $request){
        $request->validate([
            'name' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $imageName = time(). '.' . explode('/', explode(':', substr($request->profile_pic, 0, strpos($request->profile_pic, ';')))[1])[1];

        Image::make($request->profile_pic)->save(public_path('images/').$imageName)->resize(1024, 370);

        $data = array(
            'owner_id' => $request->owner_id,
            'unique_id' => Uuid::generate()->string,
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'profile_pic' => $imageName
        );
        return response('Store has been created', Response::HTTP_CREATED);

    }

    public function show(Store $store){
        return new StoreResource($store);
    }

    public function update(Request $request, Store $store){
        $store->update($request->all());
        return response('Store has been updated', Response::HTTP_OK);
    }

    public function delete(Store $store){
        $store->delete();
        return response('Store has been deleted', Response::HTTP_OK);
    }
}
