<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_group_id' => 'not_in:0',
            'user_first_name' => 'required|min:2',
            'user_email' => 'required|email:filter',
            'user_password' => 'required|min:5',
            'user_confirm_password' => 'required|same:user_password|min:5|',
        ];
    }
    public function messages()
    {
        return [
            'user_group_id.not_in' => ':attribute bắt buộc phải chọn',
            'user_first_name.required' => ':attribute bắt buộc phải nhập',
            'user_first_name.min' => ':attribute không được nhỏ hơn :min ký tự',
            'user_email.required' => ':attribute bắt buộc phải nhập',
            'user_email.email' => ':attribute không đúng',
            'user_password.required' => ':attribute bắt buộc phải nhập',
            'user_password.min' => ':attribute không được nhỏ hơn :min ký tự',
            'user_confirm_password.required' => ':attribute bắt buộc phải nhập',
            'user_confirm_password.same' => ':attribute không không đúng với mật khẩu',
            'user_confirm_password.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'user_group_id' => 'Tên nhóm',
            'user_first_name' => 'Tên lót',
            'user_email' => 'Email',
            'user_password' => 'Mật khẩu',
            'user_confirm_password' => 'Nhập lại mật khẩu',
        ];
    }
}
