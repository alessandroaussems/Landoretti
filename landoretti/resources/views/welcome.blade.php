@extends('layouts.app')

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="https://www.hdwallpapers.in/walls/autumn_bench-HD.jpg" alt="Slide 1">
            </div>
            <div class="item">
                <img src="https://www.hdwallpapers.in/walls/autumn_bench-HD.jpg" alt="Slide 2">
            </div>
            <div class="item">
                <img src="https://www.hdwallpapers.in/walls/autumn_bench-HD.jpg" alt="Slide 3">
            </div>
        </div>
@endsection
