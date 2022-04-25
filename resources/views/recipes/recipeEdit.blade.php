@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Edycja receptury</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $recipeID->id }}</li>
            <li>Zleceniodawca: {{ $recipeID->invest->client->short_name }}</li>
            </ul>
        </div>
    </div>


    <div class="card mt-3">

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('recipes.recipeUpdate', $recipeID->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label for="investment_id">Inwestycja</label>
                    <input type="text" class="form-control @error('investment_id') is-invalid @enderror" id="investment_id"
                        name="investment_id" value="{{ old('investment_id', $recipeID->invest->id) }}" />
                    @error('investment_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="recipe_number">Nr receptury</label>
                    <input type="text" class="form-control @error('recipe_number') is-invalid @enderror" id="recipe_number"
                        name="recipe_number" value="{{ old('recipe_number', $recipeID->recipe_number) }}" />
                    @error('recipe_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group col-sd-3">
                    <label for="strenght_class">Klasa wytrzymałości betonu</label>
                    <select class="form-control @error('strenght_class') is-invalid @enderror" id="strenght_class"
                        name="strenght_class">
                        <option value="{{ $recipeID->strenght_class }}">
                            {{ old('strenght_class', $recipeID->strenght_class) }}</option>
                        @foreach ($class as $row)
                            <option value={{ $row->strenght_class }}>{{ $row->strenght_class }}</option>
                        @endforeach
                    </select>
                </div>
                @error('bending_class')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="rate_time">Wiek oceny zgodności</label>
                    <select class="form-control @error('rate_time') is-invalid @enderror" id="rate_time" name="rate_time"
                        aria-label=".form-select-lg example">
                        <option selected value="{{ $recipeID->rate_time }}">
                            {{ old('rate_time', $recipeID->rate_time) }} dni</option>
                        <option value="28">28 dni</option>
                        <option value="56">56 dni</option>
                        <option value="90">90 dni</option>
                        <option value="">inny wiek</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waterproof">Stopień wodoszczelności</label>
                    <select class="form-control @error('waterproof') is-invalid @enderror" id="waterproof" name="waterproof"
                        aria-label=".form-select-lg example">
                        <option selected value="{{ $recipeID->waterproof }}">
                            {{ old('waterproof', $recipeID->waterproof) }}</option>
                        <option value="W8">W8</option>
                        <option value="W10">W10</option>
                        <option value="W12">W12</option>
                        <option value="W6">W6</option>
                        <option value="W4">W4</option>
                        <option value="Wxx">inny</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="w_days">Wiek oceny wodoszczelności</label>
                    <select class="form-control @error('w_days') is-invalid @enderror" id="w_days" name="w_days"
                        aria-label=".form-select-lg example">
                        <option selected value="{{ $recipeID->w_days }}">
                            {{ old('w_days', $recipeID->w_days) }} dni</option>
                        <option value="28">28 dni</option>
                        <option value="56">56 dni</option>
                        <option value="90">90 dni</option>
                        <option value="">inny wiek</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="properties">Inne cechy</label>
                    <input type="text" class="form-control @error('properties') is-invalid @enderror" id="properties"
                        name="properties" value="{{ old('properties', $recipeID->properties) }}">
                    @error('properties')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="comment">Uwagi/komentarz</label>
                    <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                        name="comment" value="{{ old('comment', $recipeID->comment) }}">
                    @error('comment')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="activ">Aktywna</label>
                    <select class="form-control input-sm @error('activ') is-invalid @enderror" name="activ">
                        <option {{ old('activ', $recipeID->activ) == '0' ? 'selected' : '' }} value="0">Nie</option>
                        <option {{ old('activ', $recipeID->activ) == '1' ? 'selected' : '' }} value="1">Tak</option>
                    </select>
                    @error('activ')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
