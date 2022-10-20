@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }} - próbka nr {{ $sample->protocol_number }} / {{ $sample->sample_nr }}</h5>
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
                <form action="{{ route('wsTests.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sd-2">
                            <label for="date">Data badania</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ $today }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-md-3">
                            <label for="time">Godzina badania</label>
                            <input type="time" class="form-control @error('time') is-invalid @enderror"
                                id="time" name="time" value="{{ old('time', $time) }}" />
                            @error('time')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="weight">Masa [g]</label>
                            <input type="number" class="form-control @error('weight') is-invalid @enderror"
                                id="weight" name="weight" />
                        </div>
                        @error('weight')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="force">Siła niszcz. [kN]</label>
                            <input type="number" class="form-control @error('force') is-invalid @enderror"
                                id="force" name="force" />
                        </div>
                        @error('force')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-3">
                            <label for="test_type">Rodzaj zniszczenia</label>
                            <select class="form-control @error('test_type') is-invalid @enderror" id="test_type"
                                name="test_type" aria-label=".form-select-lg example">
                                <option selected value=0>zgniot prawidłowy</option>
                                <option value=1>nieprawidłowy 1</option>
                                <option value=2>nieprawidłowy 2</option>
                                <option value=3>nieprawidłowy 3</option>
                                <option value=4>nieprawidłowy 4</option>
                                <option value=5>nieprawidłowy 5</option>
                                <option value=6>nieprawidłowy 6</option>
                                <option value=7>nieprawidłowy 7</option>
                                <option value=8>nieprawidłowy 8</option>
                                <option value=9>nieprawidłowy 9</option>
                            </select>
                        </div>
                    </div>

                    <label for="notes">Uwagi</label>
                    <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes"
                        name="notes" />
                    @error('notes')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lab_id">Wykonał</label>

                            <input type="string" class="form-control @error('lab_id') is-invalid @enderror" id="lab_id"
                                name="lab_id" value="{{ $user->name }}" readonly />
                            @error('lab_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-4">
                            <label for="client_id">Zakceptował</label>
                            <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="client_id"
                                name="client_id" readonly />
                            @error('client_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="number" class="form-control @error('id') is-invalid @enderror" id="id"
                    name="id" readonly hidden value={{$sample->id}} />

                    <input type="number" class="form-control @error('protocol_number') is-invalid @enderror" id="protocol_number"
                    name="protocol_number" readonly hidden value={{$sample->protocol_number}} />

                    <input type="number" class="form-control @error('sample_number') is-invalid @enderror" id="sample_number"
                    name="sample_number" readonly hidden value={{$sample->sample_nr}} />
            </div>
            <button type="submit" class="btn btn-primary">Zapisz wynik</button>
            <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj zmiany</a>
            </form>
        </div>
    </div>
@endsection
