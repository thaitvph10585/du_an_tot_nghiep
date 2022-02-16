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
            <form action="" method="post" novalidate>
                @csrf
                <div class="input-group mb-3">
                    <input type="name" name="name" class="form-control" placeholder="Name">
                </div>
                @error('name')
                        <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                @error('email')
                        <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone number">
                </div>
                @error('phone_number')
                        <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                </div>
                @error('re-password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>