@extends('layouts.app')

@section('content')
    @if(count($auctions)==0)
        <p>There are no auctions here!.</p>
    @endif
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
