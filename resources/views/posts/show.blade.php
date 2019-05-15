@extends('layouts.app')
@section('content')
    <ul class="list-unstyled">
            <li class="media mb-3">
                <!--<img class="mr-2 rounded" src= alt="">-->ここにアップロード画像が入る-->
                <div class="media-body">
                    <div>
                        {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">ユーザー</th> 
                                <th class="text-center">アーティスト</th>
                                <th class="text-center">曲名</th>
                                <th class="text-center">曲URL</th>
                                <th class="text-center">パート</th>
                                <th class="text-center">不明点</th>
                            </tr>
                            <tr>
                                <td>{!! nl2br(e($post->user->name)) !!}</td>
                                <td>{!! nl2br(e($post->artist)) !!}</td>
                                <td>{!! nl2br(e($post->tune)) !!}</td>
                                <td>{!! nl2br(e($post->tune_url)) !!}</td>
                                <td>{!! nl2br(e($post->part)) !!}</td>
                                <td>{!! nl2br(e($post->content)) !!}</td>
                            </tr>
                        </table>
                    </div>
    
                    <div class="btn-group" role="group" aria-label="timeLineButton">
                        @if (Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        @if (Auth::user()->now_favorite($post->id))
                            {!! Form::open(['route' => ['posts_favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('応援をやめる', ['class' => "btn btn-info btn-sm"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => ['posts_favorites.favorite', $post->id]]) !!}
                                {!! Form::submit('応援する', ['class' => "btn btn-primary btn-sm"]) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
    </ul>
    <div>
        {!! link_to_route('posts.advices.create', 'アドバイスをあげる', ['id' => $post->id], ['class' => 'btn btn-lg btn-warning']) !!}
    </div>
    <ul class="list-unstyled">
    @if (count($advices) > 0)
    @foreach ($advices as $advice)
        <li class="media mb-3">
            <!--<img class="mr-2 rounded" src= alt="">-->ここにアップロード画像が入る-->
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $advice->user->name, ['id' => $advice->user->id]) !!} <span class="text-muted">posted at {{ $advice->created_at }}</span>
                </div>
                <div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">曲へのリンク</th>
                            <th class="text-center">コメント</th>
                        </tr>
                        <tr>
                            <td><a href="{!! $advice->advice_url !!}">{!! nl2br(e($advice->advice_url)) !!}</a></td>
                            <td>{!! nl2br(e($advice->content)) !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </li>
    @endforeach
    @endif
</ul>
    
@endsection