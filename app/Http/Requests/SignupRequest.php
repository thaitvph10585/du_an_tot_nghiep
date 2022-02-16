<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
            ],
            'phone_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers(),
            ],
            're-password' => 'same:password'
        ];
        return $requestRule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập đầy đủ họ và tên',
            'name.unique' => 'Tên đã tồn tại, vui lòng nhập tên khác',
            'email.required' => 'Bạn phải nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'password.required' => 'Bạn phải nhập vào mật khẩu mới',
            'password.string' => 'Mật khẩu phải là một chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.numbers' => 'Mật khẩu phải có ít nhất 1 số',
            'password.mixedCase' => 'Mật khẩu phải có ít nhất 1 chữ hoa, 1 chữ thường',
            're-password.required' => 'Bạn phải xác nhận mật khẩu',
            're-password.same' => 'Xác nhận mật khẩu không giống',
         
        ];
    }
}
