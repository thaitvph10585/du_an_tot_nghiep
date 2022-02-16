<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(LoginRequest $req)
    {
        if(Auth::guard('webadmin')
               ->attempt($req->only(['email', 'password'])))
        {
            return redirect()
                ->route('admin.home');
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::guard('webadmin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }
}
