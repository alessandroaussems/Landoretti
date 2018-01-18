@extends('layouts.app')

@section('content')
    @if(count($auctions)==0)
        <h3 class="none">There are no auctions here!</h3>
    @endif
    <div class="row">
        @foreach($auctions as $key => $value)
            <?php
            $end = \Carbon\Carbon::parse($value->enddate);
            $now = \Carbon\Carbon::today();
            $length = $end->diffInDays($now);
            ?>
                <div class="auction">
                    <img class="auctionimage" src="{{asset('/img/auctions').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"><br>
                    <div class="auctiontext">
                    <h3>{{$value->title}}</h3><br>
                    <p><strong>Days to go: </strong>{{$length}}</p><br>
                    <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                    </div>
                </div>
        @endforeach
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
