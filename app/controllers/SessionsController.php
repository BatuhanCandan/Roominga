<?php

use Roominga\Forms\SignInForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionsController extends \BaseController
{

    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }

    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

        if (!Auth::attempt($formData)) {
            Flash::message('We were unable to sign  you in. Please check your credentials and try again!');

            return Redirect::back()->withInput();
        }

        return Redirect::home();

    }

    public function destroy()
    {
        Session::flush();
        return Redirect::home();
    }

}