<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'id' => 'required|uuid|exists:products',
            'nama' => 'required|string',
            'kategori' => 'required|uuid',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'deskripsi_singkat' => 'required|min:2|max:100|string',
            'deskripsi_lengkap' => 'required|min:2|max:10000|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'string|in:true,false'
        ];
    }
}
