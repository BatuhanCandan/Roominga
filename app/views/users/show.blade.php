@extends('layouts.default')
@section('content')
    <div class="user-info">
        @include('users.partials.avatar', ['size' => 125])
        <p>{{$user->username}}</p>
        <p>{{$user->present()->followerCount()}}</p>
        @unless( $user->is($currentUser) )
            @include('users.partials.follow-form')
        @endunless
    </div>
    <div class="xsx">
        @forelse($rooms as $room)
            <div class="photo-block text-center user-wall">
                @include('rooms.partials.room')
            </div>
        @empty
            <p>This user hasn't photo yet.</p>
        @endforelse
    </div>

@stop

