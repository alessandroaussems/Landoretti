@extends('layouts.app')

@section('content')
    <div id="carousel" class="carousel top slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <!-- IMAGES ARE OPTIMIZED FOR THE WEB! by: http://optimizilla.com/ -->
            <div class="item active">
                <img src="{{asset("img/slides/slide1.jpg")}}" alt="Slide 1" title="Slide 1">
            </div>
            <div class="item">
                <img src="{{asset("img/slides/slide2.jpg")}}" alt="Slide 2" title="Slide 1">
            </div>
            <div class="item">
                <img src="{{asset("img/slides/slide3.jpg")}}" alt="Slide 3" title="Slide 1">
            </div>
        </div>
    </div>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">{{ __('messages.working') }}</h2>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <span class="glyphicon glyphicon-pencil glyphiconhome" aria-hidden="true"></span>
                            <h3 class="mb-3">Sign up</h3>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt erat vitae commodo aliquam. Cras aliquam et mauris ut cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <span class="glyphicon glyphicon-ok glyphiconhome " aria-hidden="true"></span>
                            <h3 class="mb-3">Make deals</h3>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt erat vitae commodo aliquam. Cras aliquam et mauris ut cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <span class="glyphicon glyphicon-thumbs-up glyphiconhome" aria-hidden="true"></span>
                            <h3 class="mb-3">Everyone happy!</h3>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt erat vitae commodo aliquam. Cras aliquam et mauris ut cursus. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h2 id="popular">{{ __('messages.popular') }}</h2>
        <div id="carousel" class="carousel bottom slide" data-ride="carousel">
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
        </div>
        <div class="container text-center">
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{url("auctions/style/abstract")}}">Abstract</a></li>
                            <li><a href="{{url("auctions/style/africanamerican")}}">African American</a></li>
                            <li><a href="{{url("auctions/style/asiancontemporary")}}">Asian Contemporary</a></li>
                            <li><a href="{{url("auctions/style/conceptual")}}">Conceptual</a></li>
                            <li><a href="{{url("auctions/style/contemporary")}}">Contemporary</a></li>
                            <li><a href="{{url("auctions/style/emergingartists")}}">Emerging Artists</a></li>
                            <li><a href="{{url("auctions/style/middleeastcontemporary")}}">Middle East Contemporary</a></li>
                            <li><a href="{{url("auctions/style/minimalism")}}">Minimalism</a></li>
                            <li><a href="{{url("auctions/style/modern")}}">Modern</a></li>
                            <li><a href="{{url("auctions/style/pop")}}">Pop</a></li>
                            <li><a href="{{url("auctions/style/urban")}}">Urban</a></li>
                            <li><a href="{{url("auctions/style/vintagephotographs")}}">Vintage Photographs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{url("auctions/price/upto5000")}}">Up to 5000</a></li>
                            <li><a href="{{url("auctions/price/5000to10000")}}">5000-10000</a></li>
                            <li><a href="{{url("auctions/price/10000to25000")}}">10000-25000</a></li>
                            <li><a href="{{url("auctions/price/25000to50000")}}">25000-50000</a></li>
                            <li><a href="{{url("auctions/price/50000to100000")}}">50000-100000</a></li>
                            <li><a href="{{url("auctions/price/above")}}">Above</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{url("auctions/era/prewar")}}">Pre-war</a></li>
                            <li><a href="{{url("auctions/era/1940to1950")}}">1940s-1950s</a></li>
                            <li><a href="{{url("auctions/era/1960to1980")}}">1960s-1980s</a></li>
                            <li><a href="{{url("auctions/era/1990topresent")}}">1990s-Present</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{url("auctions/ending/thisweek")}}">Ending This Week</a></li>
                            <li><a href="{{url("auctions/ending/purchasenow")}}">Purchase Now</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="/">© <?php echo date("Y")?>  {{ config('app.name') }}</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
@endsection
