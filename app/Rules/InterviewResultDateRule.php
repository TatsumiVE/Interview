<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class InterviewResultDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $today = Carbon::today()->format('m-d-Y');
        $tomorrow = Carbon::tomorrow()->format('m-d-Y');
        $selectedDate = Carbon::parse($value)->format('m-d-Y');

        return $selectedDate === $today || $selectedDate === $tomorrow;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The result date must be today or tomorrow.';
    }
}
