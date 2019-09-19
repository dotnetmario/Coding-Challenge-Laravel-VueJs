@extends('layouts.app')

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="app">
            <home-component></home-component>
        </div>
    </div>
</div>
@endsection
