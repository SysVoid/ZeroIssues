<?php

namespace ZeroIssues\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email_address' => 'required|email|unique:emails,email,!verified',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];
    }
}
