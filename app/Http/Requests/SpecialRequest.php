<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialRequest extends FormRequest
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
            'special_item' => 'required|min:2',
            'special_title' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'special_item.required' => ':attribute bắt buộc phải nhập',
            'special_item.min' => ':attribute không được nhỏ hơn :min ký tự',
            'special_title.required' => ':attribute bắt buộc phải nhập',
            'special_title.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'special_item' => 'Tên danh mục',
            'special_title' => 'Tiêu đề',
        ];
    }
}
