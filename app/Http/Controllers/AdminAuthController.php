<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    /**View admin */
    public function index()
    {
        return view('welcome');
    }

    /**Login admin form*/
    public function login()
    {
        return view('admin.login');
    }

    /**Login admin*/
    public function postLogin(LoginRequest $request)
    {   
        $check = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($check)) {
            return redirect()->route('admin.login');
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
