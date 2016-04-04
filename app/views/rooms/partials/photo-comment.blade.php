<article>
    <div class="comment-pic">
        @include('users.partials.avatar',['user' => $room->user, 'class' => 'media-object'])
    </div>
    <div class="comment-body">
        <a href="{{ route('profile_path',$room->user->username) }}">{{ $room->user->username }}</a>
        {{ $room->comment }}
    </div>
</article>

