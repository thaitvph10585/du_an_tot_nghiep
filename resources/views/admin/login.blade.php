<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            @if(Session::has('msg'))
                <p class="login-box-msg text-danger">{{Session::get('msg')}}</p>      
            @endif
        <form action="" method="post" novalidate>
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            @error('email')
                    <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>