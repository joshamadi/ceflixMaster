<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'unique_id' => $this->unique_id,
            'product_id' => $this->product_id,
            'product_amount' => $this->product_amount,
            'order_amount' => $this->order_amount,
            'status' => $this->status,
            'ordered date and time' => $this->created_at,
        ];
    }
}
