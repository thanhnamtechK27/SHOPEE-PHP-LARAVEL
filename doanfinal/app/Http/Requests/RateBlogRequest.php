<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateBlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_rate' => 'required|integer',
            'id_blog' => 'required|integer',
            'id_user' => 'required|integer',
        ];
    }
}
