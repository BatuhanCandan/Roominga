<?php namespace Roominga\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{

    /**
     * Present a link to the user gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//gravatar.com/avatar/{$email}?s={$size}&d=retro";
    }

    /**
     * Followers count for user
     * @return string
     */
    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('follower', $count);

        return "{$count} {$plural}";
    }

    /**
     * Statuses count for user
     * @return string
     */
    public function roomCount()
    {
        $count = $this->entity->rooms()->count();
        $plural = str_plural('room', $count);

        return "{$count} {$plural}";
    }


}