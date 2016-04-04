<?php

use Laracasts\Commander\CommanderTrait;
use Roominga\Rooms\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController
{

    use CommanderTrait;

    public function store()
    {
        $input = array_add(Input::get(), 'user_id', Auth::id());
        $this->execute(LeaveCommentOnStatusCommand::class, $input);

        return Redirect::back();
    }

}