<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        アップロードした画像
    </div>
        @include('users.navtabs', ['user' => $user])
</div>
@include('user_follow.follow_button', ['user' => $user])
