<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>

        @if(isset($user->images->image))
        <img class="card-img-top" src="{{ $path }}">
        @else
        <div class="card-body">
            <form action="{{ route('users.images.store', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image">
                <button type="submit">画像を登録</button>
            </form>
        </div>
        @endif
        @include('users.navtabs', ['user' => $user])
</div>
@include('user_follow.follow_button', ['user' => $user])
