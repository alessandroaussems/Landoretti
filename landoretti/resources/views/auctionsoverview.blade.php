@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Style</th>
            <th>Title</th>
            <th>Enddate</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($auctions as $key => $value)
        <tr>
            <td><img class="auctionimage" src="{{asset('/img').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
            <td>{{$value->style}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->enddate}}</td>
            <td><a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
