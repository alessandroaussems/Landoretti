@extends('layouts.app')

@section('content')
    <h1>Your Auctions:</h1>
    <a href="./auctions/create" class="btn btn-primary pull-right create">Add new auction</a>
    <table class="table table-striped">
        <thead>
        </thead>
        <tbody>
        @foreach($auctions as $key => $value)
            <tr>
                <td><img class="auctionimagetable" src="{{asset('/img/auctions').'/'.$value->photo1}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
                <td><a href="./auctions/{{$value->id}}">{{$value->title}}</a></td>
                <td>{{$value->status}}</td>
                <td>
                    <a href="./auctions/{{$value->id}}/edit" class="btn btn-primary pull-left">Edit</a>
                    {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger pull-right')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
