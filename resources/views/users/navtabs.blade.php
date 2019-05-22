<div>
    <div class="bg-light">
        <div class="text-center">
            <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="text-secondary {{ Request::is('users/*/followings') ? 'active' : '' }}">フォロー <span class="badge badge-secondary">{{ $count_followings }}</span></a>
        </div>
        <div class="text-center">
            <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="text-secondary {{ Request::is('users/*/followers') ? 'active' : '' }}">フォロワー <span class="badge badge-secondary">{{ $count_followers }}</span></a>
        </div>
        <div class="text-center">
            <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="text-secondary {{ Request::is('users/*/favorites') ? 'active' : '' }}">応援中 <span class="badge badge-secondary">{{ $count_favorites }}</span></a>
        </div>
        <div class="text-center">
            <a href="{{ route('users.advices_favorites', ['id' => $user->id]) }}" class="text-secondary {{ Request::is('users/*/advices_favorites') ? 'active' : '' }}">いいねしたアドバイス <span class="badge badge-secondary">{{ $count_advices_favorites }}</span></a>
        </div>
    </div>    
</div>