<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {  
        Validator::make($input, [
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string'],
            'DOB' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['FirstName'],
            'last_name' => $input['LastName'],
            'dob'=> $input['DOB'],
            'role'=> $input['Role'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
