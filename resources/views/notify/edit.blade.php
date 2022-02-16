@extends('welcome')
@section('content')
<h2>Edit Notify</h2>

<form action="" method="post" enctype="multipart/form-data">
    @csrf 
    <div>
        <label for="">Title</label>
        <input type="text"  name="title" value="{{$model->title}}">
    </div>
    <div>
        <label for="">Content</label>
        <input type="text" name="content" value="{{$model->content}}">
    </div>
    <div>
        <label for="">Image</label>
        <input type="file" name="image">
        <div>
          
        </div>
    </div>
    <img src="{{$model->image}}" alt="">
    <div>
        <button type="submit"> Add</button>
    </div>
</form>
@endsection