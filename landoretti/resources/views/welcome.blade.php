@extends('layouts.app')

@section('content')
    <h1 id="welcome">{{ __('messages.welcome') }}</h1>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <!-- IMAGES ARE OPTIMIZED FOR THE WEB! by: http://optimizilla.com/ -->
            <div class="item active">
                <img src="{{asset("img/slides/slide1.jpg")}}" alt="Slide 1">
            </div>
            <div class="item">
                <img src="{{asset("img/slides/slide2.jpg")}}" alt="Slide 2">
            </div>
            <div class="item">
                <img src="{{asset("img/slides/slide3.jpg")}}" alt="Slide 3">
            </div>
        </div>
@endsection
