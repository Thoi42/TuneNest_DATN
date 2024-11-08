<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowroomUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép request này chạy
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:125',
            'address' => 'nullable|string|max:225',
            'phone' => 'nullable|string|max:30',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
