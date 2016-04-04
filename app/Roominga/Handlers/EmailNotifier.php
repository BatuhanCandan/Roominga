<?php namespace Roominga\Handlers;

use Laracasts\Commander\Events\EventListener;
use Roominga\Mailers\UserMailer;
use Roominga\Registration\Events\UserRegistered;


class EmailNotifier extends EventListener
{

    private $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function whenUserRegistered(UserRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }


} 