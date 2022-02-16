<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" novalidate>
        @csrf
        <div class="input-group mb-3">
            <input type="name" name="name" class="form-control" value="{{$infor->name}}" placeholder="Name">
        </div>
        @error('name')
                <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="{{$infor->email}}" placeholder="Email">
        </div>
        @error('email')
                <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="text" name="phone_number" class="form-control" value="{{$infor->phone_number}}" placeholder="Phone number">
        </div>
        @error('phone_number')
                <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="file" name="avatar" class="form-control" value="{{$infor->avatar}}" placeholder="Phone number">
            <img src="{{ asset($infor->avatar) }}" alt="">
        </div>
        @error('phone_number')
                <p class="text-danger">{{$message}}</p>
        @enderror
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">lưu</button>
            </div>
            <div class="col-4">
                <a href="{{route('password')}}">Change password</a>
            </div>
    </form>
</body>
</html>