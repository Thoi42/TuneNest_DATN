<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|array',
            'title.*' => 'string|max:255',
            'strong_title' => 'required|array',
            'strong_title.*' => 'string|max:255',
            'order' => 'required|array',
            'order.*' => 'integer|min:0',
            'position' => 'required|array',
            'position.*' => 'integer|min:0',
            'description' => 'nullable|array',
            'description.*' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Bạn chưa tải lên hình ảnh',
            'images.array' => 'Hình ảnh phải là một mảng',
            'images.*.image' => 'Tệp phải là hình ảnh',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif',
            'images.*.max' => 'Hình ảnh không được vượt quá 2048 KB',
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.array' => 'Tiêu đề phải là một mảng',
            'title.*.string' => 'Tiêu đề phải là chuỗi',
            'title.*.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'strong_title.required' => 'Bạn chưa nhập tiêu đề mạnh',
            'strong_title.array' => 'Tiêu đề mạnh phải là một mảng',
            'strong_title.*.string' => 'Tiêu đề mạnh phải là chuỗi',
            'strong_title.*.max' => 'Tiêu đề mạnh không được vượt quá 255 ký tự',
            'order.required' => 'Bạn chưa nhập vị trí xuất hiện',
            'order.array' => 'Vị trí xuất hiện phải là một mảng',
            'order.*.integer' => 'Vị trí xuất hiện phải là số nguyên',
            'order.*.min' => 'Vị trí xuất hiện không được nhỏ hơn 0',
            'position.required' => 'Bạn chưa nhập trang xuất hiện',
            'position.array' => 'Trang xuất hiện phải là một mảng',
            'position.*.integer' => 'Trang xuất hiện phải là số nguyên',
            'position.*.min' => 'Trang xuất hiện không được nhỏ hơn 0',
            'description.array' => 'Mô tả phải là một mảng',
            'description.*.string' => 'Mô tả phải là chuỗi',
            'description.*.max' => 'Mô tả không được vượt quá 255 ký tự',
        ];
    }
}
