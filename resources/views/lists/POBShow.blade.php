@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Protokół pobrania nr {{ $pobID->protocol_number }}</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $pobID->id }}</li>
            <li>Zleceniodawca: {{ $pobID->invest->client->short_name }}</li>
            <li>Budowa: {{ $pobID->invest->short_name }}</li>
            <li>Data pobrania: {{ $pobID->date }}</li>
            <li>Przejazd: {{ $pobID->drive }}</li>

            <li>Receptura: {{ $pobID->recipe }}</li>
            <li>Klasa wytrzymałości: {{ $pobID->compression_class }}</li>
            <li>Temperatura powietrza: {{ $pobID->air_temp }}</li>
            <li>Elementy betonowane: {{ $pobID->element }}</li>
            @if ($pobID->days_7) <li>Ściskanie 7 dni: {{ $pobID->days_7 }} próbka/ki</li> @endif
            @if ($pobID->days_28) <li>Ściskanie 28 dni: {{ $pobID->days_28 }} próbka/ki</li> @endif
            @if ($pobID->days_56) <li>Ściskanie 56 dni: {{ $pobID->days_56 }} próbka/ki</li> @endif
            @if ($pobID->volume_phone) <li>Dodatkowe próbki: {{ $pobID->volume_phone }} próbka/ki</li> @endif
            @if ($pobID->type_A)
            <li>Typ badania A: {{ $pobID->type_A }}</li>
            <li>Ilość prób A: {{ $pobID->volume_A }}</li>
            <li>Wiek do badania A: {{ $pobID->day_A }}</li>
            @endif
            @if ($pobID->type_B)
            <li>Typ badania B: {{ $pobID->type_B }}</li>
            <li>Ilość prób B: {{ $pobID->volume_B }}</li>
            <li>Wiek do badania B: {{ $pobID->day_B }}</li>
            @endif
            @if ($pobID->type_C)
            <li>Typ badania C: {{ $pobID->type_C }}</li>
            <li>Ilość prób C: {{ $pobID->volume_C }}</li>
            <li>Wiek do badania C: {{ $pobID->day_C }}</li>
            @endif
            <li>Komentarz Control: {{ $pobID->my_comment }}</li>
            <li>Pobierający: {{ $pobID->lab_id }}</li>
            <li>Odpowiedzialny na budowie: {{ $pobID->user_id }}</li>
            @if ($pobID->client_comment) <li>Komentarz Zleceniodawcy: {{ $pobID->client_comment }}</li>  @endif
            </ul>
            <a href="{{ $pobID->id }}/edit" class="btn btn-light">Edytuj protokół</a>
            <a href="{{  url()->previous() }}" class="btn btn-light">Powrót do listy PPOB</a>
        </div>
    </div>
@endsection
