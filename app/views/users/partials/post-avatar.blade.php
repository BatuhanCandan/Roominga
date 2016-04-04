<a href="{{ route('profile_path',$user->username) }}">
    <img class="media-object avatar" style="border-radius:3px"
         src="{{ $user->present()->gravatar(isset($size) ? $size : 40) }}" alt="{{ $user->username }}">
</a>