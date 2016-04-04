<?php

use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller
{

    use CommanderTrait;

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
        View::share('currentUser', Auth::user());
        View::share('signedIn', Auth::user());
    }

}
