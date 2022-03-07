<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InforRequest extends FormRequest
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
        $requestRule = [
            'name' => 'required',
            'phone_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'email' => 'required|email',
            'avatar' => 'mimes:jpg,bmp,png,gif',
        ];

        if ($this->id == null) {
            $requestRule['avatar'] = 'required|' . $requestRule['avatar'];
        }
        return $requestRule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập đầy đủ họ và tên',
            'email.required' => 'Bạn phải nhập email',
            'email.email' => 'Email không đúng định dạng',
            'avatar.required' => 'Bạn phải chọn một ảnh',
            'avatar.mimes' => 'Ảnh phải đúng định dạng',
            'phone_number.required' => 'Bạn phải nhập số điện thoại',
            'phone_number.regex' => 'Số điện thoại phải đúng định dạng',
            'phone_number.not_regex' => 'Số điện thoại không bao gồm chữ',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 9 số',
        ];
    }
}
