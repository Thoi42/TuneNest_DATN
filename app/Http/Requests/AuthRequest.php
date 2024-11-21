<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        // Kiểm tra route hoặc phương thức đang dùng để áp dụng các quy tắc phù hợp
        if ($this->isMethod('post') && $this->routeIs('register')) {
            // Quy tắc cho việc đăng ký
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|numeric|min:10',
                'password' => 'required|string|min:8|confirmed',
            ];
        }

        // Quy tắc cho việc đăng nhập
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào email.',
            'email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Bạn chưa nhập vào mật khẩu.',
            'password.min' => 'Mật khẩu nhập ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'name.required' => 'Bạn chưa nhập vào tên.',
            'phone.required' => 'Bạn chưa nhập vào số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số.',
        ];
    }
}
