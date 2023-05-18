<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'residential_address' => 'required',
            'date_of_birth' => 'required|date_format:m/d/Y',
            'cv_path' => 'required',
            'willingness_to_travel' => '',
            'expected_salary' => '',
            'last_salary' => '',
            'earliest_starting_date' => '',
            'experience' => 'required | integer',
            'position_id' => 'required | exists:positions,id',
            'agency_id' => 'required | exists:agencies,id',
            'languages' => 'required'
        ];
    }
}
