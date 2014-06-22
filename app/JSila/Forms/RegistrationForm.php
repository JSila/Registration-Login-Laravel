<?php

namespace JSila\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {
    
    /**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
        'email' => 'required|unique:users'
    ];
} 
