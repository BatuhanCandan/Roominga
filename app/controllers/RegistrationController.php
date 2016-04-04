<?php

use Laracasts\Flash\Flash;
use Roominga\Forms\RegistrationForm;
use Roominga\Registration\RegisterUserCommand;

class RegistrationController extends \BaseController
{

    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {

        $this->registrationForm = $registrationForm;
        $this->beforeFilter('guest');
    }

    public function create()
    {
        return View::make('registration.create');
    }


    public function store()
    {
        $this->registrationForm->validate(Input::all());
        $user = $this->execute(RegisterUserCommand::class);
        Auth::login($user);

        return Redirect::home();
    }


}
