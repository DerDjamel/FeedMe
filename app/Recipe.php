<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
