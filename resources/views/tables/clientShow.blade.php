@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Szczegółowe dane Zleceniodawcy</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $clientID->id }}</li>
            <li>Zleceniodawca: {{ $clientID->name }}</li>
            <li>Nazwa skrócona: {{ $clientID->short_name }}</li>
            <li>Adres: {{ $clientID->address }}</li>
            <li>Komentarz: {{ $clientID->comment }}</li>
            <li>Aktywna: {{ $clientID->activ }}</li>
            </ul>
            <a href="{{ $clientID->id }}/edit" class="btn btn-light">Edytuj inwestycję</a>
            <a href="{{ route('tables.client') }}" class="btn btn-light">Powrót do listy Zleceniodawców</a>
        </div>
    </div>
@endsection
