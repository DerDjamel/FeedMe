<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Review as ReviewResource;

class Review extends Model
{
    protected $fillable = [
        'content', 'user_id', 'recipe_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function recipe(){
        return $this->belongsTo('App\Recipe');
    }

}
