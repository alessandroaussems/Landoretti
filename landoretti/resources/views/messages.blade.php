@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1>Your Messages: </h1>
                </div>
                <div class="comments-list">
                    @foreach($messages as $key => $value)
                    <div class="media">
                        <p class="pull-right"><small>{{date('d/m/Y', strtotime($value->created_at))}}</small></p>
                        <div class="media-body">
                            {{$value->message}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
