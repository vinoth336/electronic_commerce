<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LoginUsernameFormat implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the value is a valid email OR a valid phone number
        return filter_var($value, FILTER_VALIDATE_EMAIL) || preg_match('/^[0-9]{10}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid email address or phone number.';
    }
}
