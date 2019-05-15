<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'part', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function posts_favorites()
    {
        return $this->belongsToMany(Post::class, 'posts_favorites', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function favorite($postId)
    {
        $exist = $this->now_favorite($postId);
        
        if ($exist) {
            return false;
        } else {
            $this->posts_favorites()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        $exist = $this->now_favorite($postId);
        
        if ($exist) {
            $this->posts_favorites()->detach($postId);
            return true;
        } else {
            return false;
        }
    }
    
    public function now_favorite($postId)
    {
        return $this->posts_favorites()->where('post_id', $postId)->exists();
    }
    
    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
}
