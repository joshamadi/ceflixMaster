<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Webpatser\Uuid\Uuid;

class CategoryController extends Controller
{
    public function index(Category $category){
        return CategoryResource::collection($category->latest()->get());
    }

    public function store(Request $request, Category $category){
        $request->validate([
            'name' => 'required',
//            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

//        $imageName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
//
//        Image::make($request->image)->save(public_path('images/').$imageName)->resize(200, 200);

        return Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'unique_id' => Uuid::generate()->string,
            'image' => 'image.jpg'
        ],200);

    }

    public function show_category(Category $category){
        if (empty($category))
            return response('Category not found', Response::HTTP_NOT_FOUND);
        else
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category){
        if (empty($category))
            return response('Category not found', Response::HTTP_NOT_FOUND);
        else
        $category->update(['name' => $request->name, 'slug' => str_slug($request->name)]);
        return response('Category Updated', Response::HTTP_OK);
    }

    public function delete(Category $category){
        $category->delete();
        return response('Category Deleted', Response::HTTP_NO_CONTENT);
    }
}
