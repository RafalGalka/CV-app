@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">Protokół pobrania nr {{ $pobID->protocol_number }}</h5>
        <div class="card-body">
            <ul></ul>
            <li>Zleceniodawca: {{ $pobID->invest->client->short_name }}</li>
            <li>Inwestycja: {{ $pobID->invest->short_name }}</li>

            <form action="{{ route('protocols.protocolFPPOB') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="date">Data pobrania</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ old('date', $pobID->date) }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="drive">Przejazd</label>
                            <select class="form-control @error('drive') is-invalid @enderror" id="drive" name="drive"
                                aria-label=".form-select-lg example">
                                <option selected value="{{ old($pobID->drive) }}> {{old($pobID->drive)}}"</option>
                                <option value="0">NIE</option>
                            </select>
                        </div>
                        @error('drive')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="air_temp">Temp. pow.</label>
                            <input type="float" class="form-control @error('air_temp') is-invalid @enderror" id="air_temp" value="{{ old('air_temp', $pobID->air_temp) }}"
                                name="air_temp" />
                        </div>
                        @error('air_temp')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="element">Elementy</label>
                        <textarea class="form-control @error('element') is-invalid @enderror" id="element" name="element" value="{{ old('element', $pobID->element) }}" rows="6"> </textarea>
                        @error('element')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="recipe">Nr receptury</label>
                            <input type="text" class="form-control @error('recipe') is-invalid @enderror" id="recipe"
                                name="recipe" value="{{ old('recipe', $pobID->recipe) }}"/>
                            @error('recipe')
                                <div class="invalid-feedback d-block">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="compression_class">Klasa betonu</label>
                            <input type="text" class="form-control @error('compression_class') is-invalid @enderror" id="compression_class"
                                name="compression_class" value="{{ old('compression_class', $pobID->compression_class) }}"/>
                            @error('recipe')
                                <div class="invalid-feedback d-block">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="waterproof">Klasa W</label>
                            <input type="text" class="form-control @error('waterproof') is-invalid @enderror" id="waterproof"
                                name="waterproof" value="{{ old('waterproof', $pobID->waterproof) }}"/>
                            @error('waterproof')
                                <div class="invalid-feedback d-block">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="days_28">Ś 28d</label>
                            <input type="number" class="form-control @error('days_28') is-invalid @enderror" id="days_28"
                                name="days_28" value="{{ old('days_28', $pobID->days_28) }}"/>
                            @error('days_28')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_56">Ś 56d</label>
                            <input type="number" class="form-control @error('days_56') is-invalid @enderror" id="days_56"
                                name="days_56" value="{{ old('days_56', $pobID->days_56) }}"/>
                            @error('days_56')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_7">Ś 7d</label>
                            <input type="number" class="form-control @error('days_7') is-invalid @enderror" id="days_7"
                                name="days_7" value="{{ old('days_7', $pobID->days_7) }}"/>
                            @error('days_7')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                <div class="form-row">
                    <div class="form-group col-sd-2">
                        <label for="volume_phone">Ś na telefon</label>
                        <input type="number" class="form-control @error('volume_phone') is-invalid @enderror"
                            id="volume_phone" name="volume_phone" value="{{ old('volume_phone', $pobID->volume_phone) }}"/>
                        @error('volume_phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sd-2">
                        <label for="volume_W">Próbki na Wxx </label>
                        <input type="number" class="form-control @error('volume_W') is-invalid @enderror" id="volume_W"
                            name="volume_W" />
                        @error('volume_W')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type_A">Rodzaj badania A</label>
                        <select class="form-control @error('type_A') is-invalid @enderror" id="type_A"
                            name="type_A" aria-label=".form-select-lg example">
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
                        <label for="type_B">Rodzaj badania B</label>
                        <select class="form-control @error('type_B') is-invalid @enderror" id="type_B"
                            name="type_B" aria-label=".form-select-lg example">
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
                        <label for="type_C">Rodzaj badania C</label>
                        <select class="form-control @error('type_C') is-invalid @enderror" id="type_C"
                            name="type_C" aria-label=".form-select-lg example">
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
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Zapisz protokół</button>
            <a href="{{ route('lists.POBList') }}" class="btn btn-secondary">Anuluj protokół</a>
            </form>
        </div>
        @endsection
    </div>
</div>


