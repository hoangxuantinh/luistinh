<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:8|max:255',
            'describtion' => 'required|min:12',
            'image_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Phải nhập tên slider',
            'name.min' => 'Tên slider phải nhập ít nhất 8 ký tự',
            'name.max' => 'Tên slider phải nhập Không quá 255 ký tự',
            'description.required' => 'Phải Nhập mô tả',
            'description.min' => 'Phải Nhập ít nhất 12 ký tự',
            'image_path.required' => 'Phải nhập hình ảnh'
        ];
    }
}
