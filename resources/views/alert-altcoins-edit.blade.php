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
            
        {!! Form::open(['url' => route('alert-altcoins.update', $altcoin), 'method' => 'put' ]) !!}

        {!! Form::label('name', 'Modifier la crypto : ') !!}

        {{ $altcoin->name }}

        {!! Form::label('price', 'Alerter à : ') !!}

        {!! Form::text('price', $altcoin->price ) !!}

        {!! Form::label('choices', 'En dessous de : ') !!}

        {!! Form::radio('choices', 'low') !!}

        {!! Form::label('choices', 'Au dessus de : ') !!}

        {!! Form::radio('choices', 'high') !!}

        {!! Form::submit("Modifier l'alerte !") !!}

        {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
