@extends('layouts.default')
@section('content')
    <div class="form-page">
        <h1 class="form-title">All users</h1>
        @foreach($users as $user)
            <div class="user-block">
                @include('users.partials.avatar',['size'=>70])
                <h4 class="user-block-username">
                    {{ link_to_route('profile_path',$user->username,$user->username) }}
                </h4>
            </div>
        @endforeach
        <br>
        {{ $users->links() }}
    </div>
@stop