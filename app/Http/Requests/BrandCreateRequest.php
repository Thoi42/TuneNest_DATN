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
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thương hiệu',
            'name.max' => 'Tên thương hiệu không được vượt quá 125 ký tự',
            'name.unique' => 'Tên thương hiệu đã được sử dụng',
            'image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, png, gif hoặc webp.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2 MB.',
        ];
    }
}
