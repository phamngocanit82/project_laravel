<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGroupRequest extends FormRequest
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
            'product_group_name' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'product_group_name.required' => ':attribute bắt buộc phải nhập',
            'product_group_name.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'product_group_name' => 'Tên nhóm sản phẩm',
        ];
    }
}
