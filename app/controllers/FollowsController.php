<?php

use Laracasts\Flash\Flash;
use Roominga\Users\FollowUserCommand;
use Roominga\Users\UnfollowUserCommand;

class FollowsController extends \BaseController
{


    public function store()
    {
        $input = array_add(Input::get(), 'userId', Auth::id());
        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
    }


    public function destroy()
    {
        $input = array_add(Input::get(), 'userId', Auth::id());
        $this->execute(UnfollowUserCommand::class, $input);
        Flash::success('You have now unfollowed user');

        return Redirect::back();
    }


}
