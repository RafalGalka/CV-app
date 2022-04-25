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
                        <div class="form-group col-sd-4">
                            <label for="client_name">Zleceniodawca</label>

                            <input type="hidden" class="form-control @error('client_id') is-invalid @enderror"
                                id="client_id" name="client_id" value="{{ $client->id }}" />

                            <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                id="client_name" name="client_name" value="{{ $client->short_name }}" readonly />
                            @error('client_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group col-md-3">
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
                        </div> --}}

                        <div class="form-group col-md-6">
                            <label for="invest_id">Inwestycja</label>
                            <select class="form-control @error('invest_id') is-invalid @enderror" id="invest_id"
                                name="invest_id">
                                <option value=""> --wybierz-- </option>
                                @foreach ($invest as $row)
                                    <option value={{ $row->id }}>{{ $row->short_name }}</option>
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="air_temp">Temp. pow.</label>
                            <input type="number" class="form-control @error('air_temp') is-invalid @enderror" id="air_temp"
                                name="air_temp" />
                        </div>
                        @error('air_temp')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                    </div>
                    @error('work_time')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="elements">Elementy</label>
                        <textarea class="form-control @error('elements') is-invalid @enderror" id="elements" name="elements"
                            rows="6"> </textarea>
                        @error('elements')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="days_28">Ś 28d</label>
                            <input type="number" class="form-control @error('days_28') is-invalid @enderror" id="days_28"
                                name="days_28" />
                            @error('days_28')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_56">Ś 56d</label>
                            <input type="number" class="form-control @error('days_56') is-invalid @enderror" id="days_56"
                                name="days_56" />
                            @error('days_56')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_7">Ś 7d</label>
                            <input type="number" class="form-control @error('days_7') is-invalid @enderror" id="days_7"
                                name="days_7" />
                            @error('days_7')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="volume_phone">Ś na telefon</label>
                            <input type="number" class="form-control @error('volume_phone') is-invalid @enderror"
                                id="volume_phone" name="volume_phone" />
                            @error('volume_phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="volume_W">Próbki na Wxx</label>
                            <input type="number" class="form-control @error('volume_W') is-invalid @enderror" id="volume_W"
                                name="volume_W" />
                            @error('volume_W')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group col-sd-2">
                            <label for="waterproof">Klasa wodoszczelności</label>
                            <input type="text" class="form-control @error('waterproof') is-invalid @enderror"
                                id="waterproof" name="waterproof" readonly />
                            @error('waterproof')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reaserch_type_A">Rodzaj badania A</label>
                            <select class="form-control @error('reaserch_type_A') is-invalid @enderror"
                                id="reaserch_type_A" name="reaserch_type_A" aria-label=".form-select-lg example">
                                <option value="" selected></option>
                                <option value="1">Ściskanie</option>
                                <option value="2">Wodoszczelność</option>
                                <option value="3">Mrozoodporność</option>
                                <option value="4">Nasiąkliwość</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="day_A">Dni do badania A</label>
                            <input type="number" class="form-control @error('day_A') is-invalid @enderror" id="day_A"
                                name="day_A" />
                            @error('day_A')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="volume_A">Ilość A</label>
                            <input type="number" class="form-control @error('volume_A') is-invalid @enderror" id="volume_A"
                                name="volume_A" />
                            @error('volume_A')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reaserch_type_B">Rodzaj badania B</label>
                            <select class="form-control @error('reaserch_type_B') is-invalid @enderror"
                                id="reaserch_type_B" name="reaserch_type_B" aria-label=".form-select-lg example">
                                <option value="" selected></option>
                                <option value="1">Ściskanie</option>
                                <option value="2">Wodoszczelność</option>
                                <option value="3">Mrozoodporność</option>
                                <option value="4">Nasiąkliwość</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="day_B">Dni do badania B</label>
                            <input type="number" class="form-control @error('day_B') is-invalid @enderror" id="day_B"
                                name="day_B" />
                            @error('day_B')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="volume_B">Ilość B</label>
                            <input type="number" class="form-control @error('volume_B') is-invalid @enderror" id="volume_B"
                                name="volume_B" />
                            @error('volume_B')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reaserch_type_C">Rodzaj badania C</label>
                            <select class="form-control @error('reaserch_type_C') is-invalid @enderror"
                                id="reaserch_type_C" name="reaserch_type_C" aria-label=".form-select-lg example">
                                <option value="" selected></option>
                                <option value="1">Ściskanie</option>
                                <option value="2">Wodoszczelność</option>
                                <option value="3">Mrozoodporność</option>
                                <option value="4">Nasiąkliwość</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="day_C">Dni do badania C</label>
                            <input type="number" class="form-control @error('day_C') is-invalid @enderror" id="day_C"
                                name="day_C" />
                            @error('day_C')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="volume_C">Ilość C</label>
                            <input type="number" class="form-control @error('volume_C') is-invalid @enderror" id="volume_C"
                                name="volume_C" />
                            @error('volume_C')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="my_comment">Uwagi/opis</label>
                        <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                            name="my_comment" />
                        @error('my_comment')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-row">
                        <div class="form-group col-sd-4">
                            <label for="lab_name">Wykonał</label>

                            <input type="string" class="form-control @error('lab_id') is-invalid @enderror" id="lab_name"
                                name="lab_name" value="{{ $user->name }}" readonly />
                            @error('lab_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-sd-4">
                            <label for="user_id">Zakceptował</label>

                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                name="user_id" readonly />
                            @error('user_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client_comment">Uwagi Zleceniodawcy</label>
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
