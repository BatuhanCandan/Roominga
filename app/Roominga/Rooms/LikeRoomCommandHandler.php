<?php namespace Roominga\Rooms;

use Laracasts\Commander\CommandHandler;

class LikeRoomCommandHandler implements CommandHandler
{

    private $roomRepo;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function handle($command)
    {
        $like = $this->roomRepo->likeRoom($command->user_id, $command->room_id, $command->pic_owner_id);

        return $like;
    }

}