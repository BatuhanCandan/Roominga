<?php namespace Roominga\Rooms;

class LeaveCommentOnStatusCommand
{

    public $user_id;
    public $room_id;
    public $body;

    public function __construct($user_id, $room_id, $body)
    {
        $this->user_id = $user_id;
        $this->room_id = $room_id;
        $this->body = $body;
    }

}