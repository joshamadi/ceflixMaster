<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'owner_id' => $this->owner_id,
            'unique_id' => $this->unique_id,
            'name' => $this->name,
            'slug' => str_slug($this->name),
            'profile_pic' => $this->profile_pic,
            'created' => $this->created_at->format('M D, Y'),
        ];
    }
}
