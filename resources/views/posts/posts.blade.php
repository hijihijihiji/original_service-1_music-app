<ul class="list-unstyled">
    @foreach ($posts as $post)
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

                <div>
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div>
    {!! link_to_route('posts.create', 'GIVE ME ADVICE!', [], ['class' => 'btn btn-lg btn-warning']) !!}
</div>
{{ $posts->render('pagination::bootstrap-4') }}