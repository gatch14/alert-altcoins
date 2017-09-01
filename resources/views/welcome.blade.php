@extends('layouts.base')

@section('content')
    <h1>Alert altcoins</h1>

{{--     <form method="POST">
        {!! csrf_field() !!}
        {!! Form::label('email', 'Entrez votre email : ') !!}
        {!! Form::text('email') !!}
        {!! Form::submit('Envoyer !') !!}
    </form>   --}}
    {!! Form::open(['url' => 'test']) !!}
        {!! Form::label('email', 'Entrez votre email : ') !!}
        {!! Form::text('email') !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!} 
    <p>
        @foreach($altcoins as $altcoin)
            <p> {{ $altcoin }} </p>
        @endforeach
    </p>
@endsection