<?php namespace Roominga\Rooms;

use Laracasts\Commander\CommandHandler;

class LeaveCommentOnStatusCommandHandler implements CommandHandler
{

    private $roomRepo;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function handle($command)
    {
        $comment = $this->roomRepo->leaveComment($command->user_id, $command->room_id, $command->body);

        return $comment;
    }

}