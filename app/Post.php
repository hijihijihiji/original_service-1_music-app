<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'artist', 'tune', 'tune_url', 'part', 'content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_user()
    {
        return $this->belongsToMany(User::class, 'posts_favorites', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
}
