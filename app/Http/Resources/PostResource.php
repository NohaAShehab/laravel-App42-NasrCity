<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        dd($this);
        # copy from object and add it inside
//        dd($request);
//        return parent::toArray($request);
        return [
            "post_title"=>$this->title,
            "description"=>$this->description,
            "author_id"=>$this->user->name,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "user"=>new UserResource($this->user)
//            "user"=>[
//                "name"=>$this->user->name,
//                "email"=>$this->user->email,
//                "id"=>$this->user->id
//            ]


        ];
    }
}
