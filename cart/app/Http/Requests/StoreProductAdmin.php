<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductAdmin extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255',
            'price' => 'required|integer',
            'tags' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Tên không được để trống',
        'name.unique' => 'Tên Không được phép trùng',
        'name.max' => 'Tên Không được nhập quá 255 ký tự',
        'price.required' => 'Phái nhập giá',
        'price.integer' => 'Trường này Phải Nhập Số',
        'category_id.required' => 'Trường này Phải Nhập',
        'tags.required' => 'Xin mời nhập Tags',
        'content.required' => 'Phải Nhập Content',

    ];
}
}
