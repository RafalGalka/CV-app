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
                <li>Data odbioru: {{ $protocol->date }}</li>
                <li>Przejazd: {{ $protocol->drive }}</li>
                <li>Typ badań: {{ $protocol->test_type }}</li>
                <li>Liczba prób: {{ $protocol->number_of_sample }}</li>
                <li>Typ prób: {{ $protocol->sample_type }}</li>
                <li>Komentarz Control: {{ $protocol->my_comment }}</li>
                <li>Pobierający: {{ $protocol->lab_id }}</li>
                <li>Odpowiedzialny na budowie: {{ $protocol->user_id }}</li>
                @if ($protocol->client_comment) <li>Komentarz Zleceniodawcy: {{ $protocol->client_comment }}</li>  @endif
            </ul>
            <a href="{{ route('lists.ODBEdit', ['odbID' => $protocol->id]) }}" class="btn btn-light">Edytuj protokół</a>
            <a href="{{  url()->previous() }}" class="btn btn-light">Powrót</a>
            <a href="{{ route('sample.add', ['nr' => $protocol->protocol_number]) }}" class="btn btn-light">Dodaj/usuń próbki</a>
        </div>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Oznaczenie</th>
                    <th>Data pobrania</th>
                    <th>Rodzaj badania</th>
                    <th>Klasa wytrz.</th>
                    <th>Akcje</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($save_samples ?? [] as $sample)
                    <tr>
                        <td> @if(isset($sample->number)) @for ($i=1; $i<=$sample->number; $i++)
                                @if($i<$sample->number)
                            {{ ++$nrr . ', ' }} @else {{ ++$nrr }} @endif
                            @endfor
                            @else 0 @endif
                        </td>
                        <td> @if(isset($sample->picking_date)) {{ $sample->picking_date }} @else - @endif </td>
                        <td> @switch($sample->test_type)
                            @case(1)
                                Ś
                                @break
                            @case(2)
                                W8
                                @break
                            @case(3)
                                W10
                                @break
                            @case(4)
                                F150
                                @break
                            @case(5)
                                F200
                                @break
                            @case(6)
                                Nasiąkliwość
                                @break
                            @default
                                Inne
                        @endswitch
                            @if(isset($sample->test_time)) {{ $sample->test_time }} @else - @endif </td>
                        <td> @if(isset($sample->class->strenght_class)) {{ $sample->class->strenght_class }} @else - @endif </td>
                        <td>
                            <form method="POST" action="{{ route('sample.delete', $sample->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
