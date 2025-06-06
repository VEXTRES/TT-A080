<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    protected function passwordRules()
    {
        return [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*(),.?":{}|<>]).*$/'
        ];
    }
}
