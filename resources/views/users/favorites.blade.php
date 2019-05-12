@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div>
            @if (count($favorites) > 0)
                @include('posts.posts', ['posts' => $favorites])
            @endif
        </div>
    </div>
@endsection