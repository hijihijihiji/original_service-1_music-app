@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div>
            @if (count($advices_favorites) > 0)
                <ul class="list-unstyled">
                    @foreach ($advices_favorites as $advice)
                        <li>
                            <div>
                                <div>
                                    {!! link_to_route('users.show', $advice->user->name, ['id' => $advice->user->id]) !!} <span class="text-muted">posted at {{ $advice->created_at }}</span>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center">曲へのリンク</th>
                                            <td><a href="{!! $advice->advice_url !!}">{!! nl2br(e($advice->advice_url)) !!}</a></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">コメント</th>
                                            <td>{!! nl2br(e($advice->content)) !!}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="btn-group" role="group" aria-label="timeLineButton">
                                    @if (Auth::id() == $advice->user_id)
                                        {!! Form::open(['route' => ['posts.advices.destroy', $advice->post->id, $advice->id], 'method' => 'delete']) !!}
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
                </ul>
            @endif
        </div>
    </div>
@endsection