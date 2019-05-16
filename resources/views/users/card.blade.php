<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        @if(isset($user->images->image))
        <img src="{{ $path }}">
        @else
        <form action="{{ route('users.images.store', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="image">
            <button type="submit">保存</button>
        </form>
        @endif
    </div>
        @include('users.navtabs', ['user' => $user])
</div>
@include('user_follow.follow_button', ['user' => $user])
