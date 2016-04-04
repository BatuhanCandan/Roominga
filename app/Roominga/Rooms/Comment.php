<?php namespace Roominga\Rooms;


class Comment extends \Eloquent
{

    protected $fillable = ['user_id', 'room_id', 'body'];

    public function owner()
    {
        return $this->belongsTo('Roominga\Users\User', 'user_id');
    }

    public static function leave($body, $roomId)
    {
        return new static([
            'body' => $body,
            'room_id' => $roomId
        ]);
    }
} 