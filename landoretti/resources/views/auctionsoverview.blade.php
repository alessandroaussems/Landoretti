@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Style</th>
            <th>Title</th>
            <th>Days to go</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($auctions as $key => $value)
            <?php
            $end = \Carbon\Carbon::parse($value->enddate);
            $now = \Carbon\Carbon::now();
            $length = $end->diffInDays($now);
            ?>
        <tr>
            <td><img class="auctionimage" src="{{asset('/img').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
            <td>{{$value->style}}</td>
            <td>{{$value->title}}</td>
            <td>{{$length}}</td>
            <td><a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
