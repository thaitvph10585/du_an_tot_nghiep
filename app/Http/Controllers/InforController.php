<?php

namespace App\Http\Controllers;

use App\Http\Requests\InforRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class InforController extends Controller
{

    /**View account */
    public function index() {
        return view('user.user');
    }
    public function update(InforRequest $request){
        $model = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $imgPath = $request->file('avatar')->store('storage/users');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        Alert::success('Success!', 'Bạn đã cập nhật thành công');
        return redirect(route('user.infor'));
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


    public function inforAdmin() {
        return view('admin.infor');
    }

    public function editAdminForm() {
        return view('admin.updateInfor');
    }
    public function saveEditAdmin(InforRequest $request){
        $model = Admin::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $imgPath = $request->file('avatar')->store('storage/admins');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        Alert::success('Success!', 'Bạn đã cập nhật thành công');
        return redirect(route('admin.account'));
    }
}
