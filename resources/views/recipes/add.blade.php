@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')

    <div class="card mt-3">
        <h5 class="card-header">Dodawanie receptury</h5>

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

            <form action="{{ route('recipes.recipeAdd') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <label for="client_id">Zleceniodawca</label>
                    <select class="form-control input-sm @error('client_id') is-invalid @enderror" name="client_id">
                        <option value="">--select--</option>
                        @foreach ($client as $client)
                            <option value="{{ $client->id }}">{{ $client->short_name }}</option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <label for="investment_id">Inwestycja</label>
                    <select class="form-control input-sm @error('investment_id') is-invalid @enderror" name="investment_id">
                        <option value="">--select--</option>
                        @foreach ($invest as $invest)
                            <option value="{{ $invest->id }}">{{ $invest->short_name }}</option>
                        @endforeach
                    </select>
                    @error('investment_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="recipe_number">Nr receptury</label>
                    <input type="text" class="form-control @error('recipe_number') is-invalid @enderror" id="recipe_number"
                        name="recipe_number" />
                    @error('recipe_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group col-sd-3">
                    <label for="strenght_class">Klasa wytrzymałości betonu</label>
                    <select class="form-control @error('strenght_class') is-invalid @enderror" id="strenght_class"
                        name="strenght_class">
                        @foreach ($class as $row)
                            <option value={{ $row->strenght_class }}>{{ $row->strenght_class }}</option>
                        @endforeach
                    </select>
                </div>
                @error('strenght_class')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="rate_time">Wiek oceny zgodności</label>
                    <select class="form-control @error('rate_time') is-invalid @enderror" id="rate_time" name="rate_time"
                        aria-label=".form-select-lg example">
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
                        <option value=""> - </option>
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
                        <option value=""> - </option>
                        <option value="28">28 dni</option>
                        <option value="56">56 dni</option>
                        <option value="90">90 dni</option>
                        <option value="">inny wiek</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="properties">Inne cechy</label>
                    <input type="text" class="form-control @error('properties') is-invalid @enderror" id="properties"
                        name="properties">
                    @error('properties')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="comment">Uwagi/komentarz</label>
                    <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                        name="comment">
                    @error('comment')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="activ">Aktywna</label>
                    <select class="form-control input-sm @error('activ') is-invalid @enderror" name="activ">
                        <option value=1>TAK</option>
                        <option value=0>NIE</option>
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
