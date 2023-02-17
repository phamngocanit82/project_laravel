<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGroupRequest extends FormRequest
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
            'user_group_name' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'user_group_name.required' => ':attribute bắt buộc phải nhập',
            'user_group_name.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'user_group_name' => 'Tên nhóm người sử dụng',
        ];
    }
}
