<?php namespace Roominga\Rooms;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;


class UploadRoomCommandHandler implements CommandHandler
{

    use DispatchableTrait;

    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function handle($command)
    {
        $room = Room::upload($command->roomname, $command->comment);
        $room = $this->roomRepository->save($room, $command->userId);
        $this->dispatchEventsFor($room);

        return $room;
    }

}