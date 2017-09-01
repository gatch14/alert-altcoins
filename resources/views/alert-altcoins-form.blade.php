@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! {{ $name }}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        {!! Form::open(['url' => route('alert-altcoins.store') ]) !!}

        {!! Form::label('name', 'Entrez la crypto : ') !!}

        {!! $errors->first('name', '<p>:message</p>') !!}

        {!! Form::text('name') !!}

        {!! Form::label('price', 'Alerter à : ') !!}

        {!! Form::text('price') !!}

        {!! $errors->first('price', '<p>:message</p>') !!}

        {!! Form::label('choices', 'En dessous de : ') !!}

        {!! Form::radio('choices', 'low') !!}

        {!! Form::label('choices', 'Au dessus de : ') !!}

        {!! Form::radio('choices', 'high') !!}

        {!! $errors->first('choices', '<p>:message</p>') !!}

        {!! Form::submit("M'alerter !") !!}

        {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
