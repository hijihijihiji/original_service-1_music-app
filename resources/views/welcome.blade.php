@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div> 
            <div>
                <h2 class="text-center badge-secondary">ALL POSTS</h2>
            </div>    
            <div>
            @if (count($posts) > 0)    
                @include('posts.posts', ['posts' => $posts])
            @endif    
            </div>
        </div>   
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1 class="text-white">バンドを、もっと楽しもう</h1>
                {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'border border-dark btn-light btn btn-lg']) !!}
            </div>
        </div>
        <div>
        <h3 class="text-center">みんなでバンドをより楽しむためのSNS</h3>
        <p class="text-center">ビギナー・・・コピーバンドでわからない所を聞いてみよう！</p>
        <p class="text-center">上級者・・・ビギナーのわからない所を教えてあげよう！</p>
        </div>
    @endif
@endsection