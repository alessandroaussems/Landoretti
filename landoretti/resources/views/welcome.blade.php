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
                <img src="http://www.photorating.net/images/2017/02/26/Color-Art-Abstract-4K-Wallpaperf768b.jpg" alt="Slide 1">
            </div>
            <div class="item">
                <img src="http://papers.co/wallpaper/papers.co-vu33-paint-texture-art-pattern-35-3840x2160-4k-wallpaper.jpg" alt="Slide 2">
            </div>
            <div class="item">
                <img src="http://wallpapericon.com/wp-content/uploads/2017/09/Abstract-Art-HD-Wallpaper-2017.jpg" alt="Slide 3">
            </div>
        </div>
@endsection
