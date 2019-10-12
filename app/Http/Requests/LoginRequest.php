<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\User
 */
class LoginRequest extends FormRequest
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
            'email' => 'string|required|email',
            'password' => 'string|required',
            'stayLoggedIn' => 'nullable|boolean',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'email must be set',
            'email.string' => 'email must be a valid string',
            'email.email' => 'email must be a valid email',
            'password.required' => 'password must be set',
            'password.string' => 'password must be a valid string',
            'stayLoggedIn.boolean' => 'stay logged In must be a boolean',
        ];
    }

    /**
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'strip_tags',
            'password' => 'strip_tags',
        ];
    }
}
