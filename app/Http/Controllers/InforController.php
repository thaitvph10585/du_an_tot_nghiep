<?php

namespace App\Http\Controllers;

use App\Http\Requests\InforRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InforController extends Controller
{

    /**View account */
    public function index() {
        $infor = Auth::user();
        return view('user.user', compact('infor'));
    }
    public function update(InforRequest $request){
        $model = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $imgPath = $request->file('avatar')->store('users');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('infor'));
    }

    /**View update password */
    public function show(){
        return view('user.password'); 
    }

    public function updated(PasswordRequest $request) {
       /*  //Change Password
        Auth::user()->update(['password'=> Hash::make($request->new_password)]);
        return redirect(route('user')); */
    }


    public function infoAdmin() {
        $infor = Auth::user();
        return view('admin.infor', compact('infor'));
    }

    public function updateInforAdmin() {
        $infor = Auth::user();
        return view('admin.updateInfor', compact('infor'));
    }
    public function updatedAdmin(InforRequest $request){
        $model = Admin::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $imgPath = $request->file('avatar')->store('users');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('updateInfor'));
    }
}
