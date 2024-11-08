<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|max:225',
            'slug' => 'unique:posts|max:225',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.max' => 'Tiêu đề không được vượt quá 225 từ',
            'slug.max' => 'Đường dẫn không được vượt quá 225 từ',
            'slug.unique' => 'Đường dẫn danh mục đã được xử dụng',
        ];
    }
}
