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
            <li>Aktywna: @if ($clientID->activ == 1)
                TAK
            @else
                NIE
            @endif</li>
            </ul>
            <a href="{{ $clientID->id }}/edit" class="btn btn-light">Edytuj inwestycję</a>
            <a href="{{ route('tables.client') }}" class="btn btn-light">Powrót do listy Zleceniodawców</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>lp</th>
                    <th>Budowa</th>
                    <th>Aktywny</th>
                    <th>Szczegóły</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investments ?? [] as $investment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $investment->short_name }}</td>
                        <td>@if ($investment->activ == 1)
                            TAK
                        @else
                            NIE
                        @endif
                    </td>
                        <td>
                            <a href="{{ route('tables.investShow', $investment->id) }}">Szczegóły
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
