@extends('layouts.default')
@section('content')
    <div class="form-page">
        <h1 class="form-title">Update Rooms</h1>
        <ul>
            @foreach($currentUser->rooms as $room)
                <li>{{ link_to_route('home',$room->roomname) }}</li>
            @endforeach
        </ul>
    </div>
@stop