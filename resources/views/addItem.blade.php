@extends('layouts.app')


@section('content')
<div class="container m-5">
    <h1 class="text-center">Add Item</h1>

    <form action="{{ route('add-item') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input class="form-control" type="text" name="title" placeholder="title">
        </div>

        <div class="form-group">
            <input class="form-control" type="file" name="photo">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="desc" id="" cols="30" rows="10"></textarea>
        </div>

        <input type="submit" value="Add" class="btn btn-primary">
    </form>
</div>
@endsection