<a href="{{ route('profile_path',$user->username) }}">
    <img class="img avatar" style="border-radius:3px"
         src="{{ $user->present()->gravatar(isset($size) ? $size : 24) }}" alt="{{ $user->username }}">
</a>