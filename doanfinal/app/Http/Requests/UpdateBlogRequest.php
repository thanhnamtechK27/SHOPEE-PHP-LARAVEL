<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'avatar' => 'nullable|file|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'description' => 'required|string|max:512',
            'content' => 'required|string|max:512',
        ];
    }
    public function messages()
    {
        return [
            'required' => ' không được bỏ trống title, description, content ',
            'min' => ' không được nhỏ hơn :min ký tự.',
            'max' => ' không được lớn hơn :max ký tự.',
            'integer' => ' chỉ được nhập số.',
        ];
    }
}
