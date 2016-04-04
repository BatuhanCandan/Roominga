<?php

use Laracasts\Flash\Flash;

class RemindersController extends BaseController
{

    public function getRemind()
    {
        return View::make('password.remind');
    }

    public function postRemind()
    {
        switch ($response = Password::remind(Input::only('email'))) {
            case Password::INVALID_USER:
                Flash::error(Lang::get($response));

                return Redirect::back();

            case Password::REMINDER_SENT:
                Flash::message(Lang::get($response));

                return Redirect::back();
        }
    }


    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('password.reset')->with('token', $token);
    }


    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;

            $user->save();
        });

        switch ($response) {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                Flash::error(Lang::get($response));

                return Redirect::back();

            case Password::PASSWORD_RESET:
                Flash::success('Your password has been reset. You may now log in.');

                return Redirect::to('/');
        }
    }

}
