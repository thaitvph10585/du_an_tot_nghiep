<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index(){
        $notify = Notify::all();
        return view('notify.index',compact('notify'));
    }
    public function addForm(){
        return view('notify.add');
    }
    public function saveAdd(Request $request){
        $model =  new Notify();
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('storage/product');
            $imgPath = str_replace('public/','',$imgPath);
            $model->image = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect('admin/notify');

    }
    public function remove($id){
        Notify::destroy($id);
        return redirect('/admin/notify');
    }
    public function editForm($id){
        $model = Notify::find($id);
        if(!$model){
            return back();
        }
        return view('notify.edit',compact('model'));

    }
    public function saveEdit(Request $request , $id){
        $model = Notify::find($id);
        if(!$model){
            return back();
        }
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('storage/product');
            $imgPath = str_replace('public/','',$imgPath);
            $model->image = $imgPath;

            
        }
        $model->fill($request->all());
        $model->save();
        return redirect('admin/notify');
    }
}
