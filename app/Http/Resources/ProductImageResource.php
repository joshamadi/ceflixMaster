<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
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
            'unique_id' => $this->unique_id,
            'product_id' => $this->product_id,
            'product_title' => $this->product->title,
            'category_name' => $this->product->category->name,
            'price' => $this->product->price,
            'image' => $this->product->image,
            'path' => $this->path,
        ];
    }
}
