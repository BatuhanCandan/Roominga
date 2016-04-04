<?php namespace Roominga\Rooms;

class Like extends \Eloquent
{

    protected $fillable = ['user_id', 'room_id', 'pic_owner_id'];

    public function owner()
    {
        return $this->belongsTo('Roominga\Users\User', 'user_id');
    }

    public static function like($pic_owner_id, $roomId)
    {
        return new static([
            'pic_owner_id' => $pic_owner_id,
            'room_id' => $roomId
        ]);
    }
} 