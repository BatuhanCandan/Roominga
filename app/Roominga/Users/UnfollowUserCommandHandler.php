<?php namespace Roominga\Users;

use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler
{

    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);
        $this->userRepo->unfollow($command->userIdToUnfollow, $user);

    }

}