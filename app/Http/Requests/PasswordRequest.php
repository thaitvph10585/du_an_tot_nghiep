<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
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
            'current_password' => 'required|current_password',
            'new_password' => [
                'required',
                'string',
                'different:current_password',
                Password::min(8)
                    ->mixedCase()
                    ->numbers(),
            ],
            'password_confirmation' => 'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Bạn phải nhập lại mật khẩu cũ',
            'current_password.current_password' => 'Mật khẩu bạn nhập không đúng',
            'new_password.required' => 'Bạn phải nhập vào mật khẩu mới',
            'new_password.string' => 'Mật khẩu phải là một chuỗi',
            'new_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'new_password.numbers' => 'Mật khẩu phải có ít nhất 1 số',
            'new_password.different' => 'Mật khẩu mới không được giống mật khẩu cũ',
            'new_password.mixedCase' => 'Mật khẩu phải có ít nhất 1 chữ hoa, 1 chữ thường',
            'password_confirmation.required' => 'Bạn phải xác nhận mật khẩu',
            'password_confirmation.same' => 'Xác nhận mật khẩu không giống'
        ];
    }
}
