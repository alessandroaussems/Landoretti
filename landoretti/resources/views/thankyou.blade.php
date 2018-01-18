@extends('layouts.app')

@section('content')
<h1 class="center">Thank you for your purchase! {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
<p class="center">You will be redirected soon...</p>
    <script>
        setTimeout(function () {
            window.location.href = "/";
        }, 2500);
    </script>
@endsection
