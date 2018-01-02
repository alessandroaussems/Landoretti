@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4 imagecol"><img src="{{asset("/img/auctions")."/".$auction->photo1}}" alt="{{$auction->title}}" title="{{$auction->title}}"></div>
        <div class="col-sm-4">
            <h1>{{$auction->title}}</h1>
            <p><strong>Style:</strong> {{$auction->style}}</p>
            <p><strong>Year:</strong> {{$auction->year}}</p>
            <p><strong>Width:</strong> {{$auction->width}}</p>
            <p><strong>Height:</strong> {{$auction->height}}</p>
            <p><strong>Depth:</strong> {{$auction->depth}}</p>
            <p><strong>Description:</strong> {{$auction->description}}</p>
            <p><strong>Condition:</strong> {{$auction->condition}}</p>
            <p><strong>Origin:</strong> {{$auction->origin}}</p>
            <p><strong>Minimumprice:</strong> {{$auction->minimumestimatedprice}}</p>
            <p><strong>Maxmimumprice:</strong> {{$auction->maximumestimatedprice}}</p>
            <p><strong>Buyoutprice:</strong> {{$auction->buyoutprice}}</p>
            <p><strong>Enddate:</strong> {{$auction->enddate}}</p>
            @if($alreadystarred==true)
                <a href="./{{$auction->id}}/unstar" class="btn btn-success">Unstar!</a>
            @else
            <a href="./{{$auction->id}}/star" class="btn btn-success">Star!</a>
            @endif
            <a href="../auctionbidding/{{$auction->id}}" class="btn btn-primary">Bid!</a>
            <a href="../auctionbuynow/{{$auction->id}}" class="btn btn-primary">BUY NOW!</a>
        </div>
    </div>
    <div class="container comments">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Biddings:</h2>
                </div>
                <div class="comments-list">
                    @if(count($biddings)==0)
                        <p>There are no biddings yet.</p>
                    @endif
                    @foreach($biddings as $key => $value)
                    <div class="media">
                            <h4 class="media-heading user_name"><strong>{{$value->name}}</strong></h4>
                            € {{$value->biddingprice}}
                        </div>
                    </div>
                @endforeach
                </div>



            </div>
        </div>
@endsection
