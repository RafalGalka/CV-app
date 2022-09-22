@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
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

            <div class="form-group">

                <ul>
                    <li>Zleceniodawca: {{ $data->invest->client->short_name }}</li>
                    <li>Inwestycja: {{ $data->invest->short_name }}</li>
                </ul>

                <form action="{{ route('lists.OtUpdate', $otID->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="avatar">Dodaj zdjęcie ...</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                        @error('avatar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="protocol_number">Numer protokołu</label>
                            <input type="number" class="form-control @error('protocol_number') is-invalid @enderror"
                                id="protocol_number" name="protocol_number" value="{{ $data->protocol_number }}" readonly />
                        </div>
                        @error('protocol_number')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="date">Data wykonania</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ old('date', $data->date) }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="drive">Przejazd</label>
                            <select class="form-control @error('drive') is-invalid @enderror" id="drive" name="drive"
                                aria-label=".form-select-lg example">
                                <option {{ old('activ', $data->drive) == '0' ? 'selected' : '' }} value="0">Nie</option>
                                <option {{ old('activ', $data->drive) == '1' ? 'selected' : '' }} value="1">Tak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="test_type">Rodzaj badania</label>
                            <select class="form-control @error('test_type') is-invalid @enderror" id="test_type"
                                name="test_type" aria-label=".form-select-lg example">
                                <option {{ old('activ', $data->test_type) == '1' ? 'selected' : '' }} value="1">Odwierty rdzeniowe</option>
                                <option {{ old('activ', $data->test_type) == '2' ? 'selected' : '' }} value="2">Pull-off (naklejanie)</option>
                                <option {{ old('activ', $data->test_type) == '3' ? 'selected' : '' }} value="3">Pull-off (zrywanie)</option>
                                <option {{ old('activ', $data->test_type) == '4' ? 'selected' : '' }} value="4">Sklerometr (mł. Schmidta)</option>
                                <option {{ old('activ', $data->test_type) == '5' ? 'selected' : '' }} value="5">Wilgotność - wycinanie</option>
                                <option {{ old('activ', $data->test_type) == '6' ? 'selected' : '' }} value="6">Wypożyczenie form</option>
                                <option {{ old('activ', $data->test_type) == '7' ? 'selected' : '' }} value="7">Zwrot form</option>
                                <option {{ old('activ', $data->test_type) == '8' ? 'selected' : '' }} value="8">Pobór/odbiór kruszywa</option>
                                <option {{ old('activ', $data->test_type) == '' ? 'selected' : '' }} value="">- -</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="number_of_sample">Ilość</label>
                            <input type="number" class="form-control @error('number_of_sample') is-invalid @enderror"
                                id="number_of_sample" name="number_of_sample" value="{{ $data->number_of_sample }}" />
                            @error('number_of_sample')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="my_comment">Uwagi/opis</label>
                    <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                        name="my_comment" value="{{ $data->my_comment }}"/>
                    @error('my_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lab_id">Wykonał</label>
                            <input type="string" class="form-control @error('lab_id') is-invalid @enderror" id="lab_id"
                                name="lab_id" value="{{ $data->lab_id }}" readonly />
                            @error('lab_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-4">
                            <label for="client_id">Zakceptował</label>

                            <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="client_id"
                                name="client_id" value="{{ $data->user_id }}" readonly />
                            @error('client_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="client_comment">Komentarz przekazującego</label>
                        <input type="text" class="form-control @error('client_comment') is-invalid @enderror"
                            id="client_comment" name="client_comment" value="{{ $data->client_comment }}" readonly />
                        @error('client_comment')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Zapisz protokół</button>
                    <a href="{{  url()->previous() }}" class="btn btn-secondary">Anuluj zmiany</a>
                </form>
            </div>
        </div>
    </div>
@endsection
