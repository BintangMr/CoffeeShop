<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'id' => 'required|uuid|exists:product_categories',
            'nama' => 'required|min:2',
            'status' => 'string|in:true,false'
        ];
    }
}
