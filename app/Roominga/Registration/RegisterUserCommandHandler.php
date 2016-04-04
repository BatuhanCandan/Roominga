<?php namespace Roominga\Registration;


use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Roominga\Users\User;
use Roominga\Users\UserRepository;

/**
 * Class RegisterUserCommandHandler
 * @package Larabook\Registration
 * @author Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($command)
    {
        $user = User::register($command->username, $command->email, $command->password);
        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }

}