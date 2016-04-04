<?php namespace Roominga\Registration\Events;

use Roominga\Users\User;

class UserRegistered
{

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
} 