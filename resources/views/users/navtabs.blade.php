<div class="container">
    <ul class="row nav nav-tabs nav-justified">
        <li class="nav-item"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="text-secondary nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">フォロー <span class="badge badge-secondary">{{ $count_followings }}</span></a></li>
        <li class="nav-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class="text-secondary nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">フォロワー <span class="badge badge-secondary">{{ $count_followers }}</span></a></li>
        <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="text-secondary nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">応援中 <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
        <li class="nav-item"><a href="{{ route('users.advices_favorites', ['id' => $user->id]) }}" class="text-secondary nav-link {{ Request::is('users/*/advices_favorites') ? 'active' : '' }}">いいねしたアドバイス <span class="badge badge-secondary">{{ $count_advices_favorites }}</span></a></li>
    </ul>    
</div>