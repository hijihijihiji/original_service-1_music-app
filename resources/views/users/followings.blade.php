@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div>
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection