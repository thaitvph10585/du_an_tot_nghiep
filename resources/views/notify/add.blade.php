@extends('welcome')
@section('content')
<h2>Add Notify</h2>

<form action="" method="post" enctype="multipart/form-data">
    @csrf 
    <div>
        <label for="">Title</label>
        <input type="text"  name="title">
    </div>
    <div>
        <label for="">Content</label>
        <input type="text" name="content">
    </div>
    <div>
        <label for="">Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <button type="submit"> Add</button>
    </div>
</form>
@endsection