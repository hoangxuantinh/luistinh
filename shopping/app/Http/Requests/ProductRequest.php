<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' =>  'required|min:8',
            'price' =>  'required|integer',
            'feature_image_path' =>  'required',
            'category_id' =>  'required',
            'describtion' => 'required:min:12:max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>  'Phải nhập tên sản phẩm',
            'name.min' =>  'Phải nhập ít nhất 8 ký tự',
            'price.required' =>  'Bạn chưa nhập giá sản phẩm',
            'feature_image_path.required' =>  'Bạn chưa chọn ảnh đại diện',
            'category_id.required' =>  'Xin mời chọn danh mục cha',
            'describtion.required' => 'Bạn chưa nhập trường này',
            'describtion.min' => 'Vui lòng nhập ít nhất 12 ký tự',
            'describtion.max' => 'Trường này chỉ nhập tối đa 255 ký tự',
        ];
    }
}
