@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Szczegółowe dane inwestycji</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $investID->id }}</li>
            <li>Zleceniodawca: {{ $investID->client->short_name }}</li>
            <li>Inwestycja: {{ $investID->name }}</li>
            <li>Nazwa skrócona: {{ $investID->short_name }}</li>
            <li>Szczegóły pobierania: {{ $investID->detail_picking }}</li>
            <li>Komentarz: {{ $investID->comment }}</li>
            <li>Aktywna: {{ $investID->activ }}</li>
            </ul>
            <a href="{{ $investID->id }}/edit" class="btn btn-light">Edytuj inwestycję</a>
            <a href="{{ route('tables.invest') }}" class="btn btn-light">Powrót do inwestycji</a>
        </div>
    </div>
@endsection
