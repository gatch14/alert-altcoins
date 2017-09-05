@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        {!! Form::open(['url' => route('alert-altcoins.update', $altcoin), 'method' => 'PUT' ]) !!}

        {!! Form::label('name', 'Modifier la crypto : ') !!}

        {!! Form::text('name', $altcoin->name, ['disabled' => 'disabled'] ) !!}

        {!! Form::label('price', 'Alerter à : ') !!}

        {!! Form::text('price', $altcoin->price ) !!}

        {!! $errors->first('price', '<p>:message</p>') !!}

        {!! Form::label('choices', 'En dessous de : ') !!}

        {!! Form::radio('choices', 'low', $altcoin->choices == 'low' ? 'checked' : '') !!}

        {!! Form::label('choices', 'Au dessus de : ') !!}

        {!! Form::radio('choices', 'high', $altcoin->choices == 'high' ? 'checked' : '') !!}

        {!! $errors->first('choices', '<p>:message</p>') !!}

        {!! Form::label('choices_value', 'Alerte en BTC : ') !!}

        {!! Form::radio('choices_value', 'BTC', $altcoin->choices_value == 'BTC' ? 'checked' : '') !!}

        {!! Form::label('choices_value', 'Alerte en $ : ') !!}

        {!! Form::radio('choices_value', '$', $altcoin->choices_value == '$' ? 'checked' : '') !!}

        {!! $errors->first('choices_value', '<p>:message</p>') !!}

        {!! Form::submit("Modifier l'alerte !") !!}

        {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
