<?php namespace Roominga\Rooms;


use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Roominga\Rooms\Events\RoomWasUploaded;

class Room extends \Eloquent
{
    use EventGenerator, PresentableTrait;
    protected $fillable = ['roomname', 'comment'];
    protected $table = 'rooms';
    protected $presenter = 'Roominga\Rooms\RoomPresenter';

    public function user()
    {
        return $this->belongsTo('Roominga\Users\User');
    }


    public static function upload($roomname, $comment)
    {
        $room = new static(compact('roomname', 'comment'));
        $room->raise(new RoomWasUploaded($roomname, $comment));

        return $room;
    }

    public function comments()
    {
        return $this->hasMany('Roominga\Rooms\Comment');
    }

    public function likes()
    {
        return $this->hasMany('Roominga\Rooms\Like');
    }


}