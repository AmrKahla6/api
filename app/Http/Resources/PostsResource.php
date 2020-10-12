<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostsResource extends JsonResource
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
            'key' => $this->id,
            'Head' => $this->title,
            'Content' => str::limit($this->body , 20),
            'created_at'=>$this->created_at->diffForHumans(),
        ];
    }
}
