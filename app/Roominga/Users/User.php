<?php namespace Roominga\Users;

use Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Roominga\Registration\Events\UserRegistered;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Support\Facades\Hash;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $presenter = 'Roominga\Users\UserPresenter';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }


    public function rooms()
    {
        return $this->hasMany('Roominga\Rooms\Room')->latest();
    }


    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));
        $user->raise(new UserRegistered($user));

        return $user;
    }

    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
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
