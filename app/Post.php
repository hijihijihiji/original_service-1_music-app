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
}
