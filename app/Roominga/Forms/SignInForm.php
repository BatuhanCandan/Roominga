<?php namespace Roominga\Forms;

use Laracasts\Validation\FormValidator;


class SignInForm extends FormValidator
{

    protected $rules = [
        'email' => 'required|Min:3|Max:255|',
        'password' => 'required|Min:8|Max:32|'
    ];

}