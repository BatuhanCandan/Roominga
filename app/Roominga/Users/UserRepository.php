<?php namespace Roominga\Users;

/**
 * Class UserRepository
 * @package Larabook\Users
 * @author Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class UserRepository
{

    public function save(User $user)
    {
        return $user->save();
    }


    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->Paginate($howMany);
    }


    public function findByUsername($username)
    {
        return User::whereUsername($username)->first();
    }


    public function findById($id)
    {
        return User::findOrFail($id);
    }


    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }


    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }
} 