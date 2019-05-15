<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        
        return view('welcome', [
            'posts' => $posts,
        ]);
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
        
        $user = $request->user();
        
        return redirect()->route('users.show', [$user->id]);
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
    
    public function show($id)
    {
        $post = Post::find($id);
        
        $advices = $post->advices;
        
        return view('posts.show', [
            'post' => $post,
            'advices' => $advices,
        ]);
    }
}
