<?php

namespace App\Http\Requests\Auth\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTeacherRequest extends FormRequest
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
            'name' => ['required', 'max:25', 'string'],
            'email' => ['email', 'required', 'max:25', Rule::unique('users', 'email')],
            'username' => ['required', 'max:25', Rule::unique('users', 'username')],
            'password' => ['required', 'min:6', 'max:25', 'Regex:/^\S{6,25}$/', 'confirmed'],
        ];
    }
}
