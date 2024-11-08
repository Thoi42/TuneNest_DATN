<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|min:10',
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required_with:new_password',
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
            'name.required' => 'Bạn chưa nhập vào tên.',
            'email.required' => 'Bạn chưa nhập vào email.',
            'email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'email.unique' => 'Email này đã được sử dụng.',
            'phone.required' => 'Bạn chưa nhập vào số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'old_password.required' => 'Bạn chưa nhập vào mật khẩu.',
            'old_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'new_password.required' => 'Bạn chưa nhập vào mật khẩu.',
            'new_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
          
            'new_password_confirmation.required_with' => 'Bạn chưa nhập vào mật khẩu xác nhận.',
        ];
    }
}
