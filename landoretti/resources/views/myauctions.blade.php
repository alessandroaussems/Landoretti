@extends('layouts.app')

@section('content')
    <h1>Your Auctions:</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($auctions as $key => $value)
            <tr>
                <td><img class="auctionimage" src="{{asset('/img').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
                <td>{{$value->title}}</td>
                <td>
                    <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                    <a href="./auctions/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                    {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
