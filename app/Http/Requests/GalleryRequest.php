<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'gallery_title' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'gallery_title.required' => ':attribute bắt buộc phải nhập',
            'gallery_title.min' => ':attribute không được nhỏ hơn :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'gallery_title' => 'Tiêu đề',
        ];
    }
}
