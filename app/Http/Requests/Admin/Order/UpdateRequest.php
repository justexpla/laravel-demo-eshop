<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\Shop\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => ['required', Rule::in(Order::getStatusList())],
            'fullname' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'integer', 'digits_between:3,18'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string', 'min:3'],
            'commentary' => ['nullable', 'string', 'max: 5000']
        ];
    }
}
