<?php

namespace App\Http\Requests\Auth\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectRequest extends FormRequest
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
            'title' => ['required', 'max:25', 'string'],
            'subject_code' => ['required', 'max:25', Rule::unique('subjects', 'subject_code')],
            'description' => ['required']
        ];
    }
}
