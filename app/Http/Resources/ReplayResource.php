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
        $reply = [
            'reply' => $this->body,
            'id' => $this->id,
            'question_slug' => $this->question->slug,
            'user' => $this->user->name,
            'like_count' =>$this->likes->count(),
            'liked' =>  false,
            'created_at' => $this->created_at->diffForHumans(),
        ];
        $liked = $this->likes()->where('user_id',auth()->id())->first();
        if($liked){
            $reply['liked'] = true;
        }

        return $reply;
    }
}
