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
            'can'       => $this->permissions(),
        ];
    }

    public function permissions(){
        $permissions = [
            'view'      => true,
            'create'    => false,
            'update'    => false,
            'delete'    => false,
        ];

        if(auth()->check()){
            return [
                'view'      => auth()->user()->can('viewAny', $this->resource),
                'create'    => auth()->user()->can('create', $this->resource),
                'update'    => auth()->user()->can('update', $this->resource),
                'delete'    => auth()->user()->can('delete', $this->resource),
            ];
        } 

        return $permissions;
    }
}
