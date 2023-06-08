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
        $today = Carbon::today()->startOfDay();
        $selectedDate = Carbon::createFromFormat('m-d-Y', $value)->startOfDay();
        return $selectedDate->isSameDay($today) || $selectedDate->isFuture();
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
