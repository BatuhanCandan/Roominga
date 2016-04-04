<?php namespace Roominga\Forms;

use Laracasts\Validation\FormValidator;

class UploadRoomForm extends FormValidator
{

    protected $rules = [
        'roomname' => 'required|Min:3|Max:75',
        'comment' => 'Max:255'
    ];
} 