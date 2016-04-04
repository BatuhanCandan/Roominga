<?php namespace Roominga\Mailers;

use Roominga\Users\User;


class UserMailer extends Mailer
{

    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to Roominga!';
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }

} 