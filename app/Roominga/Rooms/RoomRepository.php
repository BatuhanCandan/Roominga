<?php namespace Roominga\Rooms;

use Roominga\Users\User;

class RoomRepository
{

    public function save(Room $room, $userId)
    {
        return User::findOrFail($userId)->rooms()->save($room);
    }

    public function getAllForUser(User $user)
    {
        return $user->rooms()->with('user')->latest()->get();
    }

    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Room::whereIn('user_id', $userIds)->latest()->get();
    }

    public function getAllForAll()
    {
        $users = User::all()->lists('id');

        return Room::whereIn('user_id', $users)->latest()->get();
    }

    public function leaveComment($userId, $roomId, $body)
    {
        $comment = Comment::leave($body, $roomId);
        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }

    public function likeRoom($userId, $roomId, $pic_owner_id)
    {
        $like = Like::like($pic_owner_id, $roomId);
        User::findOrFail($userId)->likes()->save($like);

        return $like;
    }
}