@extends('layouts.app')

@section('content')
    <h1 class="text-center">Thank you {{auth()->user()->name}}.</h1>
    <hr>
    <h2 class ="text-center">The order #{{$order}} was successfully created!</h2>
@endsection
