<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:127'],
            'slug' => ['nullable', 'string', 'min:3', 'max:127', 'unique:shop_products,slug'],
            'description' => ['nullable', 'string', 'max:10000'],
            // @todo: custom price(float) validator
            'price' => ['nullable', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:shop_categories,id']
        ];
    }
}
