@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <!--<img class="rounded img-fluid" src= alt="">ここにアップロード画像が入る-->
                </div>
                <div>
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item"><a href="#" class="nav-link">Fokllowings</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
                </ul>    
                </div>
            </div>
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
        <h2 class="text-center">POSTS</h2>
            <div>
                @include('posts.posts', ['posts' => $posts])
            </div>
        </div>
    </div>   
@endsection