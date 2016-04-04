<?php namespace Roominga\Rooms;


class UploadRoomCommand
{

    public $roomname;
    public $userId;
    public $comment;

    /**
     * Constructor
     *
     * @param $body
     * @param $userId
     */
    public function __construct($roomname, $comment, $userId)
    {
        $this->userId = $userId;
        $this->comment = $comment;
        $this->roomname = $roomname;
    }

}