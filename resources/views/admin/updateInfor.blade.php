@extends('welcome')
@section('content')
@include('sweetalert::alert')
<div class="card-body">
    <h6 class="card-title">Thông tin tài khoản</h6>
    <form action="{{ route('admin.admin.edit') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label  for="">Tên người dùng</label>
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="name" name="name" class="form-control" value="{{Auth::guard('admin')->user()->name}}" placeholder="Name">
        </div>
      
        <div class="form-group mb-3">
            <label  for="">Email</label>
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="email" name="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" placeholder="Email">
        </div>
      
        <div class="form-group mb-3">
            <label  for="">Ảnh đại diện</label>
            @error('avatar')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="file" name="avatar" class="form-control" value="{{Auth::guard('admin')->user()->avatar}}">
            <img src="{{ asset(Auth::guard('admin')->user()->avatar) }}" alt="">
        </div>
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">lưu</button>
        </div>
        <div class="form-group">
            <a href="{{route('password')}}">Change password</a>
        </div>
    </form>
</div>
@endsection