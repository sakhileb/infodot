<?php

namespace App\Http\Resources;

use App\Http\Resources\CampaignResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignCollection extends ResourceCollection
{
    public $collects = CampaignResource::class;

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

    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request),
                // 'replies' => $this->replies($request),
                'recampaigns' => $this->recampaigns($request)
            ] 
        ];
    }

    protected function likes($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()
            ->whereIn(
                'campaign_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_campaign_id'))
            )
            ->pluck('campaign_id')
            ->toArray();
    }

    protected function recampaigns($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->recampaigns()
            ->whereIn(
                'original_campaign_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_campaign_id'))
            )
            ->pluck('original_campaign_id')
            ->toArray();
    }
}
