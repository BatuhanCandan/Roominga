<?php namespace Roominga\Rooms\Events;

class RoomWasUploaded
{

    private $roomname;
    private $comment;

    function __construct($roomname, $comment)
    {
        $this->roomname = $roomname;
        $this->comment = $comment;
    }
}