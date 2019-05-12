<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('welcome', $data);
    }
        
    public function store(Request $request)
    {
        $this->validate($request, [
            'artist' => 'required|max:191',
            'tune' => 'required|max:191',
            'tune_url' => 'required|max:191',
            'part' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->posts()->create([
            'artist' => $request->artist,
            'tune' => $request->tune,
            'tune_url' => $request->tune_url,
            'part' => $request->part,
            'content' => $request->content,
        ]);
        
        return $this->index();
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        
        if(\Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return back();
    }
    
    public function create()
    {
        $post = new Post;
        
        return view('posts.create', [
            'post' => $post,
        ]);
    }
}
