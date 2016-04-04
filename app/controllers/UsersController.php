<?php

use Roominga\Users\UserRepository;
use Roominga\Rooms\RoomRepository;

class UsersController extends \BaseController
{

    protected $userRepository;
    protected $roomRepository;

    function __construct(UserRepository $userRepository, RoomRepository $roomRepository)
    {
        $this->userRepository = $userRepository;
        $this->roomRepository = $roomRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getPaginated();

        return View::make('users.index')->withUsers($users);
    }

    public function show($username)
    {
        $user = $this->userRepository->findByUsername($username);
        $rooms = $this->roomRepository->getAllForUser($user);

        return View::make('users.show', compact('rooms'))->withUser($user);
    }

}