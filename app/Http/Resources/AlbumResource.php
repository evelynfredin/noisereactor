<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            $this->merge(
                Arr::only(parent::toArray($request), [
                    'id',
                    'title',
                    'cover',
                    'created_at',
                    'artist',
                    'review'
                ])
            )
        ];
    }
}
