<?php


namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/Uis", $value);
    }
    public function message()
    {
        return 'Wrong email format';
    }
}
