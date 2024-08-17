<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'id' => 'required|integer',
            'name' => 'required|string|max:255', 
            'price' => 'required|numeric|min:0', 
            'category' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255', 
            'sale' => 'nullable|numeric|min:0|max:100',
            'company' => 'nullable|string|max:255',
            'hinhanh.*' => 'image|mimes:jpeg,png,jpg,gif|max:1024', // Validate từng hình ảnh
            'detail' => 'nullable|string',
        ];
    }

}
