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

            <form action="{{ route('protocols.protocolFPPOB') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <div class="form-group">
                        <label for="avatar">Dodaj zdjęcie WZ ...</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                        @error('avatar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="protocol_number">Numer protokołu</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                id="protocol_number" name="protocol_number" value="{{ $nrProt }}" readonly />
                        </div>
                        @error('protocol_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-md-3">
                            <label for="date">Data pobrania</label>
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
                        @error('drive')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
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
                                @foreach ($invest as $row)
                                    <option value={{ $row->id }}>{{ $row->investment_name }}</option>
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
                        <div class="form-group col-md-4">
                            <label for="recipe">Receptura</label>

                            <input type="text" class="form-control @error('recipe') is-invalid @enderror" id="recipe"
                                name="recipe" />

                        </div>
                        @error('recipe')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="compression_class">Klasa betonu</label>
                            <input type="text" class="form-control @error('compression_class') is-invalid @enderror"
                                id="compression_class" name="compression_class" />
                        </div>
                        @error('compression_class')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-md-3">
                            <label for="other_class">Inne cechy</label>
                            <input type="text" class="form-control @error('other_class') is-invalid @enderror"
                                id="other_class" name="other_class" />
                        </div>
                        @error('other_class')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror


                        <div class="form-group col-md-12">
                            <label for="elements">Elementy</label>
                            <textarea class="form-control @error('elements') is-invalid @enderror" id="elements" name="elements"
                                rows="5"> </textarea>
                            @error('elements')
                                <div class=" invalid-feedback d-block">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sd-2">
                                <label for="28_days">Ś 28d</label>
                                <input type="number" class="form-control @error('28_days') is-invalid @enderror"
                                    id="28_days" name="28_days" />
                                @error('28_days')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sd-2">
                                    <label for="56_days">Ś 56d</label>
                                    <input type="number" class="form-control @error('56_days') is-invalid @enderror"
                                        id="56_days" name="28_days" />
                                    @error('56_days')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sd-2">
                                    <label for="7_days">Ś 7d</label>
                                    <input type="number" class="form-control @error('7_days') is-invalid @enderror"
                                        id="7_days" name="7_days" />
                                    @error('7_days')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reaserch_type2">Rodzaj badania</label>
                                <select class="form-control @error('reaserch_type2') is-invalid @enderror"
                                    id="reaserch_type2" name="reaserch_type2" aria-label=".form-select-lg example">
                                    <option selected></option>
                                    <option value="1">Ściskanie</option>
                                    <option value="2">Wodoszczelność</option>
                                    <option value="3">Mrozoodporność</option>
                                    <option value="4">Nasiąkliwość</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="X">Dni do badania</label>
                                <input type="number" class="form-control @error('X') is-invalid @enderror" id="X"
                                    name="X" />
                                @error('X')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="28_days">Ilość</label>
                                <input type="number" class="form-control @error('28_days') is-invalid @enderror"
                                    id="28_days" name="28_days" />
                                @error('28_days')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reaserch_type2">Rodzaj badania</label>
                                <select class="form-control @error('reaserch_type2') is-invalid @enderror"
                                    id="reaserch_type2" name="reaserch_type2" aria-label=".form-select-lg example">
                                    <option selected></option>
                                    <option value="1">Ściskanie</option>
                                    <option value="2">Wodoszczelność</option>
                                    <option value="3">Mrozoodporność</option>
                                    <option value="4">Nasiąkliwość</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="X">Dni do badania</label>
                                <input type="number" class="form-control @error('X') is-invalid @enderror" id="X"
                                    name="X" />
                                @error('X')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="X_days">Ilość</label>
                                <input type="number" class="form-control @error('X_days') is-invalid @enderror" id="X_days"
                                    name="X_days" />
                                @error('X_days')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="reaserch_type2">Rodzaj badania</label>
                                <select class="form-control @error('reaserch_type2') is-invalid @enderror"
                                    id="reaserch_type2" name="reaserch_type2" aria-label=".form-select-lg example">
                                    <option selected></option>
                                    <option value="1">Ściskanie</option>
                                    <option value="2">Wodoszczelność</option>
                                    <option value="3">Mrozoodporność</option>
                                    <option value="4">Nasiąkliwość</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Y">Dni do badania</label>
                                <input type="number" class="form-control @error('Y') is-invalid @enderror" id="Y"
                                    name="Y" />
                                @error('Y')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Y_days">Ilość</label>
                                <input type="number" class="form-control @error('Y_days') is-invalid @enderror" id="Y_days"
                                    name="Y_days" />
                                @error('Y_days')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="my_comment">Uwagi/opis</label>
                            <input type="text" class="form-control @error('my_comment') is-invalid @enderror"
                                id="my_comment" name="my_comment" />
                            @error('my_comment')
                                <div class=" invalid-feedback d-block">{{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-row">
                            <div class="form-group col-sd-4">
                                <label for="lab_id">Wykonał</label>

                                <input type="string" class="form-control @error('lab_id') is-invalid @enderror" id="lab_id"
                                    name="lab_id" value="{{ $user->name }}" readonly />
                                @error('lab_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-sd-4">
                                <label for="client_id">Zakceptował</label>

                                <input type="text" class="form-control @error('client_id') is-invalid @enderror"
                                    id="client_id" name="client_id" readonly />
                                @error('client_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz protokół</button>
                    <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj protokół</a>
            </form>
        </div>
    </div>
@endsection
