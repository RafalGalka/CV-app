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

            <form action="{{ route('protocols.protocolFPODB') }}" method="post" enctype="multipart/form-data">
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
                                id="protocol_number" name="protocol_number" value="{{ $nrProt }}" readonly />
                        </div>
                        @error('protocol_number')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="date">Data odbioru</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ $today }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="drive">Przejazd</label>
                            <select class="form-control @error('drive') is-invalid @enderror" id="drive" name="drive"
                                aria-label=".form-select-lg example">
                                <option selected value="1">TAK</option>
                                <option value="0">NIE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="client_name">Zleceniodawca</label>
                            <select class="form-control @error('client_name') is-invalid @enderror" id="client_name"
                                name="client_name">
                                <option value=""> --wybierz-- </option>
                                @foreach ($client as $row)
                                    <option value={{ $row->id }}>{{ $row->short_name }}</option>
                                @endforeach
                            </select>
                            @error('clientName')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="invest_id">Inwestycja</label>
                            <select class="form-control @error('invest_id') is-invalid @enderror" id="invest_id"
                                name="invest_id">
                                <option value=""> --wybierz-- </option>
                                @foreach ($invest as $inv)
                                    <option value={{ $inv->id }}>{{ $inv->short_name }}</option>
                                @endforeach
                            </select>
                            @error('invest_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                        @error('invest_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="number_of_sample">Ilość prób</label>
                            <input type="number" class="form-control @error('number_of_sample') is-invalid @enderror"
                                id="number_of_sample" name="number_of_sample" />
                            @error('number_of_sample')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sample_type">Typ prób</label>
                            <select class="form-control @error('sample_type') is-invalid @enderror" id="sample_type"
                                name="sample_type" aria-label=".form-select-lg example">
                                <option value="1">150x150x150</option>
                                <option value="2">100x100x100</option>
                                <option value="3">walcowe</option>
                                <option value="4">sześcienne inne</option>
                                <option value="">różne/inne</option>
                            </select>
                            @error('sample_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="my_comment">Uwagi/opis</label>
                    <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                        name="my_comment" />
                    @error('my_comment')
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
                    <div class="form-group">
                        <label for="client_comment">Komentarz przekazującego</label>
                        <input type="text" class="form-control @error('client_comment') is-invalid @enderror"
                            id="client_comment" name="client_comment" readonly />
                        @error('client_comment')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Zapisz protokół</button>
                <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj protokół</a>
            </form>
        </div>
    </div>
@endsection
