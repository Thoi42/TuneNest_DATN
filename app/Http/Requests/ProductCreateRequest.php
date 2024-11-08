<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:products|max:125',
            // 'category_id' => 'required|exists:product_categories,id',
            // 'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0|max:999999999',
            'price_sale' => 'nullable|numeric|min:0|lt:price',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm không được vượt quá 125 ký tự',
            'name.unique' => 'Tên sản phẩm đã được sử dụng',
            // 'category_id.required' => 'Bạn chưa chọn danh mục sản phẩm',
            // 'category_id.exists' => 'Danh mục sản phẩm không tồn tại',
            // 'brand_id.required' => 'Bạn chưa chọn thương hiệu sản phẩm',
            // 'brand_id.exists' => 'Thương hiệu sản phẩm không tồn tại',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0',
            'price.max' => 'Giá sản phẩm vượt quá giới hạn',
            'price_sale.numeric' => 'Giá khuyến mãi phải là số',
            'price_sale.min' => 'Giá khuyến mãi phải lớn hơn hoặc bằng 0',
            'price_sale.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, png, gif hoặc webp.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2 MB.',
        ];
    }
}
