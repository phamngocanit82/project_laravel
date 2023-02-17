<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionAboutRequest extends FormRequest
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
            'section_about_title' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'section_about_title.required' => ':attribute bắt buộc phải nhập',
            'section_about_title.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'section_about_title' => 'Tiêu đề',
        ];
    }
}
