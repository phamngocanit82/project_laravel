<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_group_id' => 'not_in:0',
            'product_name' => 'required|min:2',
            'product_code' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'product_group_id.not_in' => ':attribute bắt buộc phải chọn',
            'product_name.required' => ':attribute bắt buộc phải nhập',
            'product_name.min' => ':attribute không được nhỏ hơn :min ký tự',
            'product_code.required' => ':attribute bắt buộc phải nhập',
            'product_code.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'product_group_id' => 'Tên nhóm',
            'product_name' => 'Tên sản phẩm',
            'product_code' => 'Mã sản phẩm',
        ];
    }
}
