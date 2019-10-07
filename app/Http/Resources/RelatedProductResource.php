<?php

namespace App\Http\Resources;

use App\Model\Product;
use App\Model\ProductImages;
use Illuminate\Http\Resources\Json\JsonResource;

class RelatedProductResource extends JsonResource
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
            'category_id' => $this->category_id,
            'store_id' => $this->store_id,
            'category_name' => $this->category->name,
            'store_name' => $this->store->name,
            'image' => $this->image,
            'title' => $this->title,
            'path' => $this->path,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'type' => $this->type,
            'views' => $this->views,
        ];
    }
}
