<?php

namespace App\Http\Resources;

use App\Model\Product;
use App\Model\ProductImages;
use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'category_id' => $this->product->category_id,
            'product_title' => $this->product->title,
            'category_name' => $this->product->category->name,
            'store_name' => $this->product->store->name,
            'image' => $this->product->image,
            'path' => $this->product->path,
            'product_images' => ProductImages::where('product_id', $this->product_id)->get(),
            'price' => $this->product->price,
            'description' => $this->product->description,
            'type' => $this->product->type,
            'views' => $this->product->views,
            'status' => $this->product->status,
            'related_product' => Product::where('category_id', $this->product->category_id)->get(),
        ];
    }
}
