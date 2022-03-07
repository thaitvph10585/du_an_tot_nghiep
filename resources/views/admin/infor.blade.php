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
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="{{$infor->email}}" placeholder="Email">
        </div>
        <div class="input-group mb-3">
            <img src="{{ asset($infor->avatar) }}" alt="">
        </div>
        <div class="col-4">
            <a href="{{route('password')}}">Change infor account</a>
        </div>
    </form>
</body>
</html>