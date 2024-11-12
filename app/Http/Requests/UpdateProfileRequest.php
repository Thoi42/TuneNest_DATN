<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'new_password' => 'nullable|string|min:8',
            'new_password_confirmation' => 'required_with:new_password|same:new_password',
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
            'phone.required' => 'Bạn chưa nhập vào số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'old_password.required' => 'Bạn chưa nhập vào mật khẩu.',
            'old_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'new_password.required_with' => 'Bạn chưa nhập vào mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password_confirmation.required_with' => 'Bạn chưa nhập vào mật khẩu xác nhận.',
            'new_password_confirmation.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu mới.',
        ];
    }

    /**
     * Add custom validation logic for the request.
     */
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = Auth::guard('customer')->user(); // Lấy người dùng hiện tại

            if ($this->filled('new_password') && Hash::check($this->new_password, $user->password)) {
                $validator->errors()->add('new_password', 'Mật khẩu mới không thể trùng với mật khẩu cũ.');
            }
        });
    }
}
