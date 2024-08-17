<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
 /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cho phép mọi người sử dụng request này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|unique:categories,id',
            'name' => 'required',
        ];
    }

    /**
     * Customize error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'ID Category is required.',
            'id.unique' => 'ID Category must be unique.',
            'name.required' => 'name is required.',
        ];
    }
}
