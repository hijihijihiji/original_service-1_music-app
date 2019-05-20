@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            <table class="table table-bordered">
                <tr>
                    <td>パート</td>
                    <td>{{ $user->part }}</td>
                </tr>
            </table> 
        </div>
    </div>

    <div class="row"> 
        <div class="col-12">
        <h2 class="text-center badge-secondary">POSTS</h2>
            <div>
                @include('posts.posts', ['posts' => $posts])
            </div>
        </div>
    </div>   
@endsection