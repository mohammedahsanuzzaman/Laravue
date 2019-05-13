<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'reply' => $this->body,
        //     'id' => $this->id,
        //     'user' => $this->user->name,
        //     'user_id' => $this->user_id,
        //     'question_slug' => $this->question->slug,
        //     'like_count' => $this->like->count(),
        //     // 'liked' =>!! $this->like->where("user_id", auth()->user()->id)->count(),
        //     'created_at' => $this->created_at->diffForHumans()
        // ];

        $arrayData = [
            'reply' => $this->body,
            'id' => $this->id,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'question_slug' => $this->question->slug,
            'like_count' => $this->like->count(),
            'created_at' => $this->created_at->diffForHumans()
        ];
    
        if(auth()->user() !== null){
            $arrayData['liked'] = !! $this->like->where("user_id", auth()->user()->id)->count();
        }
    
        return $arrayData;
    }
}
