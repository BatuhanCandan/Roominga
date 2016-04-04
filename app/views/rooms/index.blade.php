@extends('layouts.default')
@section('content')

    @forelse($rooms as $room)
        <div class="post-info">
            <div class="pull-right">
                @include('users.partials.post-avatar',['user' => $room->user])
            </div>
            <div class="pull-right text-right profile-text">
                <a href="{{ route('profile_path',$room->user->username) }}"><strong>{{ $room->user->username }}</strong></a>

                <p class="text-muted"><strong>{{ $room->present()->timeSincePublished() }}</strong></p>
            </div>
        </div>

        <div class="photo-block">
            @include('rooms.partials.room')
        </div>
    @empty
            <p>This page hasn't photo yet.</p>
    @endforelse


@stop

