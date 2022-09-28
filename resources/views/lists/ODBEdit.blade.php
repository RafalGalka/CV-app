@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">
            <ul>
                <li>Zleceniodawca: {{ $data->invest->client->short_name }}</li>
                <li>Inwestycja: {{ $data->invest->short_name }}</li>
            </ul>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lists.ODBUpdate', ['odbID' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

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
                            <label for="date">Data odbioru</label>
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
                        <div class="form-group col-md-2">
                            <label for="number_of_sample">Ilość prób</label>
                            <input type="number" class="form-control @error('number_of_sample') is-invalid @enderror"
                                id="number_of_sample" name="number_of_sample" value="{{ old('date', $data->number_of_sample)}}" />
                            @error('number_of_sample')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sample_type">Typ prób</label>
                            <select class="form-control @error('sample_type') is-invalid @enderror" id="sample_type"
                            name="sample_type" aria-label=".form-select-lg example">
                                <option value="{{ old('sample_type', $data->sample_type) }}" selected>
                                    @switch($data->sample_type)
                                        @case(1)
                                            150x150x150</option>
                                            @break
                                        @case(2)
                                            100x100x100</option>
                                            @break
                                        @case(3)
                                            walcowe</option>
                                            @break
                                        @case(4)
                                            sześcienne inne</option>
                                            @break
                                        @default
                                            różne/inne</option>
                                    @endswitch
                                <option value="1">150x150x150</option>
                                <option value="2">100x100x100</option>
                                <option value="3">walcowe</option>
                                <option value="4">sześcienne inne</option>
                                <option value="">różne/inne </option>
                            </select>
                            @error('sample_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="my_comment">Uwagi/opis</label>
                    <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                        name="my_comment" autocomplete="off" value="{{ old('my_comment', $data->my_comment) }}" />
                    @error('my_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lab_id">Wykonał</label>

                            <input type="string" class="form-control @error('lab_id') is-invalid @enderror" id="lab_id"
                                name="lab_id" value="{{ $data->user_id }}" readonly />
                            @error('lab_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-4">
                            <label for="client_id">Zakceptował</label>

                            <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="client_id"
                                name="client_id" readonly value="{{ $data->user_id }}" />
                            @error('client_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="client_comment">Komentarz przekazującego</label>
                        <input type="text" class="form-control @error('client_comment') is-invalid @enderror"
                            id="client_comment" name="client_comment" readonly value="{{ $data->client_comment }}"/>
                        @error('client_comment')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <button type="submit" name="btn" value="save" class="btn btn-primary">Zapisz zmiany</button>
                <button type="submit" name="btn" value="addSample" class="btn btn-primary">Zapisz protokół i dodaj listę prób</button>
                <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj zmiany protokół</a>
            </form>
        </div>
    </div>
@endsection

