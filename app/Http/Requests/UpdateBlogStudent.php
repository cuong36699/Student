<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogStudent extends FormRequest
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
            'avatar' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048|',
            'email' => 'unique:students,email,' . $this->student,
            'phone' => 'unique:students,phone,' . $this->student,
        ];
    }

    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // image
                'avatar.image' => 'File được chọn không phải hình',
                'avatar.mimes' => 'File chọn phải là jpeg,png,jpg,gif,svg',
                'avatar.max' => 'Tên file không được quá 2048 ký tự',
                // email
                'email.unique' => 'Email này đã có người sử dụng',
                // phone
                'phone.unique' => 'Số điện này đã được sử dụng',
            ];
        }else{
            return [];
        }

    }
}
