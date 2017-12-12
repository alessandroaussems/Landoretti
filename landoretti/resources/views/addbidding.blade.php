@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Html::ul($errors->all(), array('class' => 'errors'))}}

        {{ Form::open(['url' => 'addbidding','files' => true])}}


        {{ Form::hidden('auctionid', $auctionid) }}

        <div class="form-group">
            {{ Form::label('bidding', 'Your bidding:',array('class' => 'required'))  }}
            {{ Form::text('bidding', Input::old('bidding'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Bid!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
    <br>
    </div>
@endsection
