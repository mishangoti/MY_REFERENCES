<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function like()
    {
        return $this->hasMany('App\Like');
    }
    public function dislike()
    {
        return $this->hasMany('App\Dislike');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
