@extends('layouts.app')

@section('content')
<h1>Thank you for your purchase! {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
@endsection
