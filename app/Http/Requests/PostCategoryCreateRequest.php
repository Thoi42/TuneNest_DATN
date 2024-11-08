<?php

namespace App\Http\Requests;

use App\Models\PostCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCategoryCreateRequest extends FormRequest
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
            'name' => ['required',
                      Rule::unique('post_categories')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                        }),
                      'max:225',
            ],
            'slug' => [
                    'max:225',
                    Rule::unique('post_categories')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tiêu đề',
            'name.max' => 'Tiêu đề không được vượt quá 225 từ',
            'name.unique' => 'Tiêu đề danh mục đã được xử dụng',
        ];
    }
}
