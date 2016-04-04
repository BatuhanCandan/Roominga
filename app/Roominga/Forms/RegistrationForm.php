<?php namespace Roominga\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator
{

    protected $rules = [
        'username' => 'Required|Min:3|Max:255|Regex:/^[a-z-.]+( [a-z-.]+)*$/i|unique:users',
        'email' => 'required|email|Between:3,255|unique:users',
        'password' => 'required|Between:8,32|Regex:/^([a-z0-9!@#$€£%^&*_+-])+$/i|confirmed'
    ];
}