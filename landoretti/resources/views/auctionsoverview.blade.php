@extends('layouts.app')

@section('content')
    @if(count($auctions)==0)
        <p>There are no auctions here!.</p>
    @endif
    <div class="filters">
        <h3>Style</h3>
        <ul class="style">
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
        <h3>Price</h3>
        <ul class="style">
            <li><a href="{{url("auctions/price/upto5000")}}">Up to 5000</a></li>
            <li><a href="{{url("auctions/price/5000to10000")}}">5000-10000</a></li>
            <li><a href="{{url("auctions/price/10000to25000")}}">10000-25000</a></li>
            <li><a href="{{url("auctions/price/25000to50000")}}">25000-50000</a></li>
            <li><a href="{{url("auctions/price/50000to100000")}}">50000-100000</a></li>
            <li><a href="{{url("auctions/price/above")}}">Above</a></li>
        </ul>
        <h3>Era</h3>
        <ul class="style">
            <li></li>
        </ul>
        <h3>Endings</h3>
        <ul class="style">
            <li></li>
        </ul>
    </div>
    <div class="row">
        @foreach($auctions as $key => $value)
            <?php
            $end = \Carbon\Carbon::parse($value->enddate);
            $now = \Carbon\Carbon::today();
            $length = $end->diffInDays($now);
            ?>
                <div class="col-sm-4 auction">
                    <img class="auctionimage" src="{{asset('/img').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"><br>
                    <h3>{{$value->title}}</h3><br>
                    <p><strong>Days to go: </strong>{{$length}}</p><br>
                    <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                </div>
        @endforeach
    </div>
@endsection
