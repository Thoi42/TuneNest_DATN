<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:brands|max:125',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thương hiệu',
            'name.max' => 'Tên thương hiệu không được vượt quá 125 ký tự',
            'name.unique' => 'Tên thương hiệu đã được sử dụng',
        ];
    }
}
