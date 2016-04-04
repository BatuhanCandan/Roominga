<article class="comments__comment">
    <div class="pull-left">
        @include('users.partials.avatar',['user' => $comment->owner, 'class' => 'media-object'])
    </div>
    <div class="comment-body">
        <a href="{{ route('profile_path',$comment->owner->username) }}">{{ $comment->owner->username }}</a>
        {{ $comment->body }}
    </div>
</article>