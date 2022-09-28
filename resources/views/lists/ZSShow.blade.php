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
                <li>Data pobrania: {{ $protocol->date }} @if ($protocol->time), czas: {{ $protocol->time }} @endif</li>
                <li>Przejazd: {{ $protocol->drive }}</li>
                @if ($protocol->recipe) <li>Receptura: {{ $protocol->recipe }}</li>  @endif
                <li>Klasa wytrzymałości na ściskanie: {{ $protocol->class->strenght_class }}</li>
                <li>Klasa wytrzymałości na zginanie: {{ $protocol->classBending->strenght_class }}</li>
                <li>Elementy: {{ $protocol->element }}</li>
                @if ($protocol->days_7) <li>Ściskanie 7 dni: {{ $protocol->days_7 }}</li>  @endif
                @if ($protocol->days_28) <li>Ściskanie 28 dni: {{ $protocol->days_28 }}</li>  @endif
                @if ($protocol->days_56) <li>Ściskanie 56 dni: {{ $protocol->days_56 }}</li>  @endif
                @if ($protocol->volume_A) <li>Ściskanie {{ $protocol->day_A }} dni: {{ $protocol->volume_A }}</li>  @endif
                <li>Komentarz Control: {{ $protocol->my_comment }}</li>
                <li>Pobierający: {{ $protocol->lab_id }}</li>
                <li>Odpowiedzialny na budowie: {{ $protocol->user_id }}</li>
                @if ($protocol->client_comment) <li>Komentarz Zleceniodawcy: {{ $protocol->client_comment }}</li>  @endif
            </ul>
            <a href="{{ route('lists.ZSEdit', ['zsID' => $protocol->id]) }}" class="btn btn-light">Edytuj protokół</a>
            <a href="{{  url()->previous() }}" class="btn btn-light">Powrót</a>
        </div>
    </div>
@endsection
