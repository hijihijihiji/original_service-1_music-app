<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = ['user_id', 'advice_url', 'content', 'post_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function favorite_user()
    {
        return $this->belongsToMany(User::class, 'advices_favorites', 'advice_id', 'user_id')->withTimestamps();
    }
}
