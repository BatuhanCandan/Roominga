<?php namespace Roominga\Rooms;

class LikeRoomCommand
{

    public $user_id;
    public $room_id;
    public $pic_owner_id;

    public function __construct($user_id, $room_id, $pic_owner_id)
    {
        $this->user_id = $user_id;
        $this->room_id = $room_id;
        $this->pic_owner_id = $pic_owner_id;
    }

}