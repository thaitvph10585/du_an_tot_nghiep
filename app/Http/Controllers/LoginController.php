<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signupForm()
    {
        return view('user.signup');
    }

    public function postSignup(SignupRequest $request)
    {
        $model = new User();
        $model->password = Hash::make($request->password);
        $model->fill($request->all());
        $model->save();
        return redirect(route('login'));
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('user'));
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }
}
