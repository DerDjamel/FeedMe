<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\User as UserResource;
use App\User;

use App\Http\Resources\Recipe as RecipeResource;
use App\Recipe;

class Review extends JsonResource
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
            'content'   => $this->content,
            'user'      => new UserResource(User::find($this->user_id)),
            'can'       => $this->when(auth()->check(), $this->permissions()),
        ];
    }

    public function permissions(){
        if(auth()->check()){
            return [
                'view'      => auth()->user()->can('viewAny', $this->resource),
                'create'    => auth()->user()->can('create', $this->resource),
                'update'    => auth()->user()->can('update', $this->resource),
                'delete'    => auth()->user()->can('delete', $this->resource),
            ];
        } 
    }
}
