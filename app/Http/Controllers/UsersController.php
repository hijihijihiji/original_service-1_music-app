<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Image;
use Storage;

class UsersController extends Controller
{
    public function index() 
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        if (isset($user->images->image)) {
            $imageUrl = $user->images->image;
            $path = Storage::disk('s3')->url($imageUrl);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
                'path' => $path,
            ];
        }else{
            $path = "";
            $data = [
                'user' => $user,
                'posts' => $posts,
                'path' => $path,
            ];
        }
        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        if (isset($user->images->image)) {
            $imageUrl = $user->images->image;
            $path = Storage::disk('s3')->url($imageUrl);
            
            $data = [
                'user' => $user,
                'users'=> $followings,
                'path' => $path,
            ];
        }else{
            $path = "";
            $data = [
                'user' => $user,
                'users'=> $followings,
                'path' => $path,
            ];
        }
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        if (isset($user->images->image)) {
            $imageUrl = $user->images->image;
            $path = Storage::disk('s3')->url($imageUrl);
            
            $data = [
                'user' => $user,
                'users' => $followers,
                'path' => $path,
            ];
        }else{
            $path = "";
            $data = [
                'user' => $user,
                'users' => $followers,
                'path' => $path,
            ];
        }
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->posts_favorites()->paginate(10);
        
        if (isset($user->images->image)) {
            $imageUrl = $user->images->image;
            $path = Storage::disk('s3')->url($imageUrl);
            
            $data = [
                'user' => $user,
                'favorites' => $favorites,
                'path' => $path,
            ];
        }else{
            $path = "";
            $data = [
                'user' => $user,
                'favorites' => $favorites,
                'path' => $path,
            ];
        }
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
    
    public function advices_favorites($id)
    {
        $user = User::find($id);
        $advices_favorites = $user->advices_favorites()->paginate(10);
        
        if (isset($user->images->image)) {
            $imageUrl = $user->images->image;
            $path = Storage::disk('s3')->url($imageUrl);
            
            $data = [
                'user' => $user,
                'advices_favorites' => $advices_favorites,
                'path' => $path,
            ];
        }else{
            $path = "";
            $data = [
                'user' => $user,
                'advices_favorites' => $advices_favorites,
                'path' => $path,
            ];
        }
        
        $data += $this->counts($user);
        
        return view('users.advices_favorites', $data);
    }

}
