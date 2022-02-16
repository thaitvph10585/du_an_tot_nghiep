<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5 mb-5 center">
        <div class="col-6">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="" disabled>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="current_password" value="" class="form-control" placeholder="">
                @error('current_password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new_password" value="" class="form-control" placeholder="">
                @error('new_password')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="">Comfirm password</label>
                <input type="password" name="password_confirmation" value="" class="form-control" placeholder="">
                @error('password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        <div class="col-12">
            <br>
            <a href="{{route('password')}}" class="btn btn-danger">Hủy</a>
            &nbsp;
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</form>