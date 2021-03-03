<?php

namespace App\Http\Requests\Shop\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:127'],
            'email' => ['required', 'email'],
            'fullname' => ['nullable', 'string', 'min:3', 'max:255'],
            'phone' => ['nullable', 'integer', 'digits_between:3,18'],
            'address' => ['nullable', 'string', 'min:3', 'max:255'],
        ];
    }
}
