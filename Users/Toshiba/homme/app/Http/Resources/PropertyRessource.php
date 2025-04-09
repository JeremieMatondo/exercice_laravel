<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @property Property $resource
     
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            
        ];
    }
}
