@extends('layouts.app')
@section('content')
    <ul class="list-unstyled">
            <li class="mb-3">
                <div>
                    <div>
                        {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">ユーザー</th> 
                                <td>{!! nl2br(e($post->user->name)) !!}</td>
                            </tr>
                            <tr>
                                <th class="text-center">アーティスト</th>
                                <td>{!! nl2br(e($post->artist)) !!}</td>
                            </tr>
                            <tr>
                                <th class="text-center">曲名</th>
                                <td>{!! nl2br(e($post->tune)) !!}</td>
                            </tr>
                            <tr>
                                <th class="text-center">曲URL</th>
                                <td><a href="{!! $post->tune_url !!}">{!! nl2br(e($post->tune_url)) !!}</a></td>
                            </tr>
                            <tr>
                                <th class="text-center">パート</th>
                                <td>{!! nl2br(e($post->part)) !!}</td>
                            </tr>
                            <tr>
                                <th class="text-center">不明点</th>
                                <td>{!! nl2br(e($post->content)) !!}</td>
                            </tr>
                        </table>
                    </div>
    
                    <div class="btn-group" role="group" aria-label="timeLineButton">
                        @if (Auth::user()->now_favorite($post->id))
                            {!! Form::open(['route' => ['posts_favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('応援をやめる', ['class' => "btn border border-dark btn-light btn-sm"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => ['posts_favorites.favorite', $post->id]]) !!}
                                {!! Form::submit('応援する', ['class' => "btn border border-dark btn-light btn-sm"]) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
    </ul>
    <div>
        {!! link_to_route('posts.advices.create', 'アドバイスをあげる', ['id' => $post->id], ['class' => 'btn btn-lg border border-dark btn-light']) !!}
    </div>
    <div>
        <h2 class="text-center badge-secondary">ADVICES</h2>
    </div>
    <ul class="list-unstyled">
    @if (count($advices) > 0)
    @foreach ($advices as $advice)
        <li class="mb-3">
            <div>
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
                <div class="btn-group" role="group" aria-label="timeLineButton">
                    @if (Auth::id() == $advice->user_id)
                        {!! Form::open(['route' => ['posts.advices.destroy', $post->id, $advice->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn border border-dark btn-light btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                    @if (Auth::user()->now_favorite_advices($advice->id))
                        {!! Form::open(['route' => ['advices_favorites.unfavorite', $advice->id], 'method' => 'delete']) !!}
                            {!! Form::submit('NICE!を取り消す', ['class' => "btn border border-dark btn-light btn-sm"]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['advices_favorites.favorite', $advice->id]]) !!}
                            {!! Form::submit('NICE!', ['class' => "btn border border-dark btn-light btn-sm"]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
    @endif
</ul>
    
@endsection