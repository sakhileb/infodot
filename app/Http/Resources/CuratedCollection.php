<?php

namespace App\Http\Resources;

use App\Http\Resources\CuratedResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CuratedCollection extends ResourceCollection
{
    public $collects = CuratedResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
