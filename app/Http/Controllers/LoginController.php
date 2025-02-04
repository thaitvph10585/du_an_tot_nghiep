<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**signup view */
    public function signupForm()
    {
        return view('user.signup');
    }

    /**signup form */
    public function postSignup(SignupRequest $request)
    {
        $model = new User();
        $model->password = Hash::make($request->password);
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.login'));
    }

    /**Login view */

    public function loginForm()
    {
        return view('user.login');
    }

    /**Login form */
    public function postLogin(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('user.login'));
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }
}
