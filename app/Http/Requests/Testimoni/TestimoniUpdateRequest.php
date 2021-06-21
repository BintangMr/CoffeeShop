<?php

namespace App\Http\Requests\Testimoni;

use Illuminate\Foundation\Http\FormRequest;

class TestimoniUpdateRequest extends FormRequest
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
            'id' => 'required|uuid|exists:testimonis',
            'deskripsi' => 'required|string',
            'nama' => 'required|string',
            'pekerjaan' => 'required|string',
        ];
    }
}
