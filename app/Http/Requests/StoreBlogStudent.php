<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogStudent extends FormRequest
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
            'avatar' => 'file|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|',
            'email' => 'required|email|min:2|unique:students',
            'phone' => 'required|min:2|unique:students',
        ];
    }

    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // image
                'avatar.required' => 'vui lòng chọn hình ảnh',
                'avatar.image' => 'File được chọn không phải hình',
                'avatar.mimes' => 'File chọn phải là jpeg,png,jpg,gif,svg',
                'avatar.max' => 'Tên file không được quá 2048 ký tự',
                // email
                'email.required' => 'Vui lòng nhập email',
                'email.min' => 'Email không được dưới 2 ký tự',
                'email.max' => 'Email không được vượt quá 100 ký tự',
                'email.email' => 'Phải là email',
                'email.unique' => 'email đã tồn tại',
                //
                'phone.unique' => 'Số điện thoại này đã được sử dụng', 
            ];
        }else{
            return [];
        }

    }
}
