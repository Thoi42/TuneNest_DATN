<?php

namespace App\Http\Requests;

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
        return [
            'name' => 'required|max:225',
            // 'parent_id' => 'unique:languages,canonical,'.$this->id.'',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tiêu đề',
            'name.max' => 'Tên ngôn ngứ không được vượt quá 225 từ',
        ];
    }
}
