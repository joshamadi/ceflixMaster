<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'order_id' => $this->order_id,
            'amount' => $this->amount." dollars",
            'reference' => $this->reference,
            'status' => $this->status,
            'transaction date and time' => $this->created_at,
        ];
    }
}
