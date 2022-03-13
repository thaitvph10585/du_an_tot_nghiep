@extends('welcome')
@section('content')
<div class="card-body">
    <h6 class="card-title">Thông tin tài khoản</h6>
    <form action="" method="post" novalidate enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label  for="">Tên người dùng</label>
            <input type="name" name="name" class="form-control" value="{{  $infor->name }}" placeholder="Name">
        </div>
        <div class="form-group mb-3">
            <label  for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$infor->email}}" placeholder="Email">
        </div>
        <div class="form-group mb-3">
            <label  for="">Ảnh đại diện</label>
            <img src="{{ asset($infor->avatar) }}" alt="">
        </div>
        <div class="col-4">
            <a href="{{ route('admin.account') }}">Change infor account</a>
        </div>
    </form>
</div>
@endsection
