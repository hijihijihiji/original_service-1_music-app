<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="media mb-3">
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
                            <td><a href="{!! $post->tune_url !!}">{!! nl2br(e($post->tune_url)) !!}</a></td>
                            <td>{!! nl2br(e($post->part)) !!}</td>
                            <td>{!! nl2br(e($post->content)) !!}</td>
                        </tr>
                    </table>
                </div>

                <div class="btn-group" role="group" aria-label="timeLineButton">
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'border border-dark btn btn-light btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                    @if (Auth::user()->now_favorite($post->id))
                        {!! Form::open(['route' => ['posts_favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('応援をやめる', ['class' => "border border-dark btn btn-light btn-sm"]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['posts_favorites.favorite', $post->id]]) !!}
                            {!! Form::submit('応援する', ['class' => "border border-dark btn btn-light btn-sm"]) !!}
                        {!! Form::close() !!}
                    @endif
                        {!! link_to_route('posts.show', '助ける!', [$post->id], ['class' => 'border border-dark btn btn-light btn-sm']) !!}
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div>
    {!! link_to_route('posts.create', 'アドバイスをもらう!', [], ['class' => 'btn btn-lg border border-dark btn-light']) !!}
</div>
{{ $posts->render('pagination::bootstrap-4') }}