<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^[\+]{0,1}380([0-9]{9})$/', $value);
    }


    public function message()
    {
        return 'User phone number. Number should start with code of Ukraine +380';
    }
}
