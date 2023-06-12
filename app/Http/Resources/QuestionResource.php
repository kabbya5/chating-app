<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'title' => $this->title,
            'path' => $this->path,
            'slug' => $this->slug,
            'body' => $this->body,
            'user' => $this->user->name,
            'created_date' => $this->created_at->diffForHumans(),
            'user_id' => $this->user->id,
            'category_id' => $this->category_id,
            'category' => $this->category->name,
        ];
    }
}
