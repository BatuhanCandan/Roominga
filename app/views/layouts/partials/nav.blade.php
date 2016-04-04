<nav class="nav" role="navigation">
    <a class="nav-mobile2" href="{{ Auth::check() ? route('home') : route('home') }}"><span
                class="glyphicon glyphicon-home"></span>Roominga</a>
    <ul class="nav-list">
        <li class="logo"><a href="{{ Auth::check() ? route('home') : route('home') }}"><span
                        class="glyphicon glyphicon-home"></span>Roominga</a></li>
        <li class="nav-item nav-left">{{ link_to_route('home','Recent') }}</li>
        <li id="popular" class="nav-item nav-left"><a href="#">Popular</a></li>
        <li class="nav-item nav-left">{{ link_to_route('users_path','Browse Users') }}</li>

        @if($currentUser)
            <li class="nav-item nav-right dropdownn">
                <a class="uffff"><img id="gravatar-button" style="border-radius:2px"
                                      src="{{ $currentUser->present()->gravatar(28) }}"
                                      alt="{{$currentUser->username}}">

                    <p id="gravatar-text">Me</p></a>
                <ul role="menu">
                    <li>{{ link_to_route('profile_path',$currentUser->username,$currentUser->username) }}</li>
                    <li>
                        {{ Form::open(['route' => 'upload_path']) }}
                        <a style="cursor: pointer;" onclick="$(this).closest('form').submit()">Upload Rooms</a>
                        {{ Form::close() }}
                    </li>
                    <li>{{ link_to_route('update_path','Update Your Rooms') }}</li>
                    <li>{{ link_to_route('logout_path','Sign Out') }}</li>
                </ul>
            </li>
            <li id="upload-button" class="nav-item nav-right cam">
                {{ Form::open(['route' => 'upload_path']) }}
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-camera"></button>
                {{ Form::close() }}
            </li>
        @else
            <li class="nav-item nav-right nav-login">{{ link_to_route('login_path','Sign In') }}</li>
            <li class="nav-item nav-right">{{ link_to_route('register_path','Register') }}</li>
        @endif
    </ul>
</nav>