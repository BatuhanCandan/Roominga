<?php

use Laracasts\Commander\CommanderTrait;
use Roominga\Rooms\Like;
use Roominga\Rooms\LikeRoomCommand;

class LikesController extends \BaseController
{

    use CommanderTrait;

    function __construct(){
        $this->beforeFilter('auth');
    }

    public function store()
    {
        $input = array_add(Input::get(),'user_id', Auth::id());
        $this->execute(LikeRoomCommand::class, $input);

        return Redirect::back();
    }

    public function destroy(){
        $roomId = Input::get('room_id');

        Like::whereUser_id(Auth::id())->whereRoom_id($roomId)->delete();

        return Redirect::back();
    }


}