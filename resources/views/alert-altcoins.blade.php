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
            <a href="{{ route('alert-altcoins.create') }}">Ajouter une alerte</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            Crypto
        </div>
        <div class="col-md-3">
            Prix
        </div>
        <div class="col-md-3">
            Update
        </div>
        <div class="col-md-3">
            Delete
        </div>
    </div>
    <div class="row">
        @foreach($altcoins as $altcoin)
            <div class="col-md-3">
                {{ $altcoin->name }}
            </div>
            <div class="col-md-3">
                {{ $altcoin->choices }} {{ $altcoin->price }}
            </div>
            <div class="col-md-3">
                <a href="{{ route('alert-altcoins.edit', $altcoin) }}">Update</a>
            </div>
            <div class="col-md-3">
                <form action="{{ route('alert-altcoins.destroy', $altcoin) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Supprimer {{ $altcoin->id }}">
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
