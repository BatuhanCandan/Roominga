<?php namespace Roominga\Rooms;

use Laracasts\Presenter\Presenter;
use Roominga\Users\User;
use Illuminate\Support\Facades\DB;


class RoomPresenter extends Presenter
{


    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }

    public function getCount()
    {
        $room_path = public_path() . '/rooms/' . $this->user->id . '/' . $this->roomname . '/';
        $dh = opendir($room_path);
        while (false !== ($filename = readdir($dh))) {
            $files[] = $filename;
        }
        return count($files) - 2;
    }

    public function getImage()
    {
        $echoing = '<div class="carousel-inner">';

        $room_path = public_path() . '/rooms/' . $this->user->id . '/' . $this->roomname . '/';
        $dh = opendir($room_path);
        while (false !== ($filename = readdir($dh))) {
            if ($filename != '.' && $filename != '..') {
                $user = $this->user->id;
                $roomname = $this->roomname;
                $path = 'rooms/' . $user . '/' . $roomname . '/' . $filename;
                $echoing .= '<div class="item"><a><img style="width: 100%" src="';
                $echoing .= $path;
                $echoing .= '"/></a></div>';
            }
        }
        $echoing .= '</div>';


        return $echoing;
    }

    public function isLike($roomId, $userId)
    {
        $user = DB::table('likes')->where('user_id', $userId)->where('room_id', $roomId)->first();

        if (count($user) == 1) {
            return 1;
        } else return 0;

    }

    public function hasComment($roomId)
    {
        $comment = DB::table('rooms')->where('id',$roomId)->pluck('comment');
        if($comment == ""){
            return 0;
        } else return 1;
    }


    public function getLikersList()
    {
        $count = $this->entity->likes()->count();
        if ($count != 0) {
            $user_id = $this->entity->likes()->first()->user_id;
            $count = $count - 1;
            $username = User::whereId($user_id)->first()->username;
            $routing = route('profile_path', $username);
            return '<a href=' . $routing . '>' . $username . '</a> and ' . $count . ' users like it!';
        } else {
            return "nobody like it ,yet!";
        }
    }


}