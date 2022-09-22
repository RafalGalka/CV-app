@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Protokół pobrania nr {{ $protocol->protocol_number }}</h5>
        <div class="card-body">
            <ul>
            <li>Zleceniodawca: {{ $protocol->invest->client->short_name }}</li>
            <li>Budowa: {{ $protocol->invest->short_name }}</li>
            <li>Data pobrania/badania: {{ $protocol->date }}</li>
            <li>Przejazd: {{ $protocol->drive }}</li>
            <li>Typ badań: {{ $protocol->test_type }}</li>
            <li>Liczba prób/badań: {{ $protocol->number_of_sample }}</li>
            <li>Komentarz Control: {{ $protocol->my_comment }}</li>
            <li>Pobierający: {{ $protocol->lab_id }}</li>
            <li>Odpowiedzialny na budowie: {{ $protocol->user_id }}</li>
            @if ($protocol->client_comment) <li>Komentarz Zleceniodawcy: {{ $protocol->client_comment }}</li>  @endif
            </ul>
            <a href="{{ route('lists.OtEdit', ['otID' => $protocol->id]) }}" class="btn btn-light">Edytuj protokół</a>
            <a href="{{  url()->previous() }}" class="btn btn-light">Powrót</a>
        </div>
    </div>
@endsection
