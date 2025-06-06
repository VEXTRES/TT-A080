<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'regex:/^(?!\s*$).+/'], // No solo espacios
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'name.regex' => 'El nombre no puede contener solo espacios en blanco.',
            'password.regex' => 'La contraseña debe tener al menos 8 caracteres, incluir un número y un carácter especial.',
        ])->validate();

        return User::create([
            'name' => trim($input['name']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
