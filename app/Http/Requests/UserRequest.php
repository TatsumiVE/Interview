<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'interviewer_id'=>'required|exists:interviewers,id|unique:users,interviewer_id',
            'password' => 'required|confirmed',
            //'password_confirmation' => 'required',
            'role'=>'required|exists:roles,id',
        ];
    }
}
