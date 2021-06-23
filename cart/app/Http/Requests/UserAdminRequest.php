<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAdminRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'display_name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Phải nhập tên',
            'name.min' => 'Phải nhập ít nhất 8 ký tự',
            'name.max' => 'Nhập tối đa 255 ký tự',
            'email.required' => 'Phải nhập Email',
            'email.email' => 'Trường này phải là Email',
            'password.required' => 'Chưa nhập password',
            'role_id.required' => 'Chưa nhập chức vụ'
        ];
    }
}
