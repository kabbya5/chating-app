<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplayResource extends JsonResource
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
            'reply' => $this->body,
            'id' => $this->id,
            'question_slug' => $this->question->slug,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
