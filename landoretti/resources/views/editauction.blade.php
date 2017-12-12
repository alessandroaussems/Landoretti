@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Html::ul($errors->all(), array('class' => 'errors'))}}

        {{ Form::model($auction, array('route' => array('auctions.update', $auction->id), 'method' => 'PUT','files' => true)) }}

        <div class="form-group">
            {{ Form::label('title', 'Title',array('class' => 'required'))  }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('style', 'Style',array('class' => 'required'))  }}
            {{ Form::text('style', Input::old('style'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('year', 'Year',array('class' => 'required'))  }}
            {{ Form::text('year', Input::old('year'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('width', 'Width',array('class' => 'required'))  }}
            {{ Form::text('width', Input::old('width'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('height', 'Height',array('class' => 'required'))  }}
            {{ Form::text('height', Input::old('height'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('depth', 'Depth',array('class' => 'required'))  }}
            {{ Form::text('depth', Input::old('depth'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description',array('class' => 'required'))  }}
            {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('condition', 'Condition',array('class' => 'required'))  }}
            {{ Form::text('condition', Input::old('condition'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('origin', 'Origin',array('class' => 'required'))  }}
            {{ Form::text('origin', Input::old('origin'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('minimumestimatedprice', 'Minimum Estimated price',array('class' => 'required'))  }}
            {{ Form::text('minimumestimatedprice', Input::old('minimumestimatedprice'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('maximimumestimatedprice', 'Maximum Estimated price',array('class' => 'required'))  }}
            {{ Form::text('maximumestimatedprice', Input::old('maximumestimatedprice'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('buyoutprice', 'Buyout price',array('class' => 'required'))  }}
            {{ Form::text('buyoutprice', Input::old('buyoutprice'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('enddate', 'Enddate',array('class' => 'required'))  }}
            {{ Form::text('enddate', Input::old('enddate'), array('class' => 'form-control')) }}
        </div>


        <div class="form-group">
            <input type="file" name="image" id="image" class="required">
        </div>

        <div class="form-group">

            {{ Form::checkbox('conditionsaccepted', 'false')}}
            Accept the conditions
        </div>


        {{ Form::submit('Edit auction', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
    <br>
    </div>
@endsection
