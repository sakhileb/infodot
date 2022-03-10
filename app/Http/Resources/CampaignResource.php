<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\CampaignResource;
use App\Http\Resources\EntityCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'parent_ids' => $this->parents()->pluck('id')->toArray(),
            'body' => $this->body,
            'type' => $this->type,
            'original_campaign' => new CampaignResource($this->originalCampaign),
            'likes_count' => $this->likes->count(),
            'recampaign_count' => $this->recampaign->count(),
            'replies_count' => $this->replies->count(),
            'replying_to' => optional(optional($this->parentTweet)->user)->username,
            'user' => new UserResource($this->user),
            'media' => new MediaCollection($this->media),
            'entities' => new EntityCollection($this->entities),
            'created_at' => $this->created_at->timestamp,
        ];
    }
}
