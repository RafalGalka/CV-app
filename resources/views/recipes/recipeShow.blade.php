@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Dane receptury</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $recipeID->id }}</li>
                <li>Zleceniodawca: {{ $recipeID->invest->client->short_name }}</li>
                <li>Inwestycja: {{ $recipeID->invest->short_name }}</li>
                <li>Nr receptury: {{ $recipeID->recipe_number }}</li>
                <li>Klasa wytrzymałości: {{ $recipeID->strenght_class }}</li>
                <li>Wiek oceny zgodności: {{ $recipeID->rate_time }} dni</li>
                <li>Stopień wodoszczelności: {{ $recipeID->waterproof }}</li>
                <li>Wiek do oceny wodoszczelności: {{ $recipeID->w_days }} dni</li>
                <li>Inne cechy: {{ $recipeID->properties }}</li>
                <li>Uwagi/komentarz: {{ $recipeID->comment }}</li>
                <li>Aktywna: @if ($recipeID->activ == 1)
                    TAK
                @else
                    NIE
                @endif</li>
            </ul>
            <a href="{{ $recipeID->id }}/edit" class="btn btn-light">Edytuj recepturę</a>
            <a href="{{ route('recipes.recipe') }}" class="btn btn-light">Powrót do listy</a>
        </div>
    </div>
@endsection
