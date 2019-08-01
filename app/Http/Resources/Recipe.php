<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\User as UserResource;
use App\User;

use App\Http\Resources\Review as ReviewResource;
use App\Review;



class Recipe extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'content'   => $this->content,
            'user'      => new UserResource(User::find($this->user_id)),
            'reviews'   => ReviewResource::collection($this->reviews),
            'can'       => $this->when(auth('api')->check(), $this->permissions()),
        ];
    }

    public function permissions(){
        if(auth('api')->check()){
            return [
                'view'      => auth('api')->user()->can('viewAny', $this->resource),
                'create'    => auth('api')->user()->can('create', $this->resource),
                'update'    => auth('api')->user()->can('update', $this->resource),
                'delete'    => auth('api')->user()->can('delete', $this->resource),
            ];
        } 
    }
}
