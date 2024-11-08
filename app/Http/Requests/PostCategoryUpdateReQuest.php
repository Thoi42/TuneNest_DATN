<?php

namespace App\Http\Requests;

use App\Models\PostCategory;
use Illuminate\Foundation\Http\FormRequest;

class PostCategoryUpdateReQuest extends FormRequest
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
        $postCategory = PostCategory::where('slug', $this->route('slug'))->whereNull('deleted_at')->first();
        return [
            'name' => 'required|unique:post_categories,name,'.$postCategory->id.' |max:225', // xét unique bỏ qua id hiện tại
            // 'parent_id' => 'unique:languages,canonical,'.$this->id.'',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tiêu đề',
            'name.max' => 'Tên ngôn ngứ không được vượt quá 225 từ',
            'name.unique' => 'Tiêu đề danh mục đã được xử dụng',
        ];
    }
}
