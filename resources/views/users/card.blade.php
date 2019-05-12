<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        <!--<img class="rounded img-fluid" src= alt="">ここにアップロード画像が入る-->
    </div>
        @include('users.navtabs', ['user' => $user])
</div>
@include('user_follow.follow_button', ['user' => $user])
