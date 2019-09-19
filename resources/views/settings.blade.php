@extends('layouts.app')


@section('content')
    <div class="container mt-5 mx-5">
        <form action="{{ route('update-password') }}" method="post">
            @csrf

            <div class="form-group">
                <input class="form-control" type="password" name="old_pass" placeholder="Old Password">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="pass" placeholder="New Password">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="pass_confirmation" placeholder="Confirm New Password">
            </div>

            <input type="submit" value="Change" class="btn btn-primary">
        </form>
    </div>
@endsection