@extends('layouts.app')

@section('content')
    <img src="{{asset("/img")."/".$auction->photo1}}" alt="{{$auction->title}}" title="{{$auction->title}}">
<h1>{{$auction->title}}</h1>
<p>Style: {{$auction->style}}</p>
<p>Year: {{$auction->year}}</p>
<p>Width: {{$auction->width}}</p>
<p>Height: {{$auction->height}}</p>
<p>Depth: {{$auction->depth}}</p>
<p>Description: {{$auction->description}}</p>
    <p>Condition: {{$auction->condition}}</p>
    <p>Origin: {{$auction->origin}}</p>
    <p>Minimumprice: {{$auction->minimumestimatedprice}}</p>
    <p>Maxmimumprice: {{$auction->maximumestimatedprice}}</p>
    <p>Buyoutprice: {{$auction->buyoutprice}}</p>
    <p>Enddate: {{$auction->enddate}}</p>
    <a href="./{{$auction->id}}/star" class="btn btn-success">Star!</a>
    <a href="./{{$auction->id}}/unstar" class="btn btn-success">Unstar!</a>
    <a href="../auctionbidding/{{$auction->id}}" class="btn btn-primary">Bid!</a>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Biddings:</h2>
                </div>
                <div class="comments-list">
                    @foreach($biddings as $key => $value)
                    <div class="media">
                            <h4 class="media-heading user_name">{{$value->name}}</h4>
                            € {{$value->biddingprice}}
                        </div>
                    </div>
                @endforeach
                </div>



            </div>
        </div>
@endsection
