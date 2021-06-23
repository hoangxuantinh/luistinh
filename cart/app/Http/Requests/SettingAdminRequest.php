<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAdminRequest extends FormRequest
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
            'configure_key' => 'bail|required|min:8|max:255',
            'configure_value' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'configure_key.required' => 'Chỉ Nhập nhiều nhất 255 Ký Tự',

            'configure_key.required' => 'Phải Nhập Configure Key',
            'configure_key.min' => 'Phải Nhập ít nhất 8 ký tự',
            'configure_value.required' => 'Phải nhập Configure Value'
        ];
    }
}
