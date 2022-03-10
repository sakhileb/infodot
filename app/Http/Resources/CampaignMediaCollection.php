<?php

namespace App\Http\Resources;

use App\Http\Resources\CampaignMediaResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignMediaCollection extends ResourceCollection
{
    public $collectd = CampaignMediaResource::class;

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
