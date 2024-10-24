<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product_categories,name,'.$this->id.'|max:225', // xét unique bỏ qua id hiện tại
            // 'parent_id' => 'unique:languages,canonical,'.$this->id.'', // Nếu cần thiết, có thể uncomment và điều chỉnh
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tiêu đề',
            'name.max' => 'Tên danh mục không được vượt quá 225 ký tự',
            'name.unique' => 'Tiêu đề danh mục đã được sử dụng',
        ];
    }
}
