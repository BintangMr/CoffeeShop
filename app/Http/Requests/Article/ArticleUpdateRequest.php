<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'id' => 'required|uuid|exists:articles',
            'judul' => 'required|min:2|max:255',
            'caption' => 'required|string|max:85',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'string|in:true,false'
        ];
    }
}
