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

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="avatar">Dodaj zdjęcie WZ ...</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                        @error('avatar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
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
                                name="date" value="{{ old('date', $today) }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="drive">Przejazd</label>
                            <select class="form-control @error('drive') is-invalid @enderror" id="drive" name="drive"
                                aria-label=".form-select-lg example">
                                <option value=1 {{ old('drive') == 1 ? 'selected' : ''}} > TAK</option>
                                <option value=0 {{ old('drive') === 0 ? 'selected' : ''}} >NIE</option>
                            </select>
                        </div>
                        @error('drive')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-2">
                            <label for="air_temp">Temp. powietrza</label>
                            <input type="number" step="0.1" class="form-control @error('air_temp') is-invalid @enderror" id="air_temp"
                                name="air_temp" value="{{ old('air_temp') }}" autocomplete="off"/>
                        </div>
                        @error('air_temp')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <livewire:show-invest :prot="$prot"/>

                    <div class="form-group">
                        <label for="element">Elementy <i>(informacje od Zleceniodawcy)</i></label>
                        <textarea class="form-control @error('element') is-invalid @enderror" id="element" name="element"
                            rows="5" autocomplete="off"> {{ old('element') }} </textarea>
                        @error('element')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sd-2">
                            <label for="days_28">Ś 28d</label>
                            <input type="number" class="form-control @error('days_28') is-invalid @enderror" id="days_28"
                                name="days_28" value="{{ old('days_28') }}" />
                            @error('days_28')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_56">Ś 56d</label>
                            <input type="number" class="form-control @error('days_56') is-invalid @enderror" id="days_56"
                                name="days_56" value="{{ old('days_56') }}"/>
                            @error('days_56')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-sd-2">
                            <label for="days_7">Ś 7d</label>
                            <input type="number" class="form-control @error('days_7') is-invalid @enderror" id="days_7"
                                name="days_7" value="{{ old('days_7') }}"/>
                            @error('days_7')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                <div class="form-row">
                    <div class="form-group col-sd-2">
                        <label for="volume_phone">Ś na telefon</label>
                        <input type="number" class="form-control @error('volume_phone') is-invalid @enderror"
                            id="volume_phone" name="volume_phone" value="{{ old('volume_phone') }}"/>
                        @error('volume_phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sd-2">
                        <label for="volume_W">Próbki na Wxx </label>
                        <input type="number" class="form-control @error('volume_W') is-invalid @enderror" id="volume_W"
                            name="volume_W" value="{{ old('volume_W') }}"/>
                        @error('volume_W')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="type_A">Rodzaj badania A</label>
                        <select class="form-control @error('type_A') is-invalid @enderror" id="type_A"
                            name="type_A" aria-label=".form-select-lg example">
                            <option value="0" {{ old('type_A') == 0 ? 'selected' : ''}} > </option>
                            <option value="1" {{ old('type_A') == 1 ? 'selected' : ''}}>Ściskanie</option>
                            <option value="2" {{ old('type_A') == 2 ? 'selected' : ''}}>Wodoszczelność</option>
                            <option value="3" {{ old('type_A') == 3 ? 'selected' : ''}}>Mrozoodporność</option>
                            <option value="4" {{ old('type_A') == 4 ? 'selected' : ''}}>Nasiąkliwość</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="day_A">Dni do badania A</label>
                        <input type="number" class="form-control @error('day_A') is-invalid @enderror" id="day_A"
                            name="day_A" value="{{ old('day_A') }}"/>
                        @error('day_A')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="volume_A">Ilość A</label>
                        <input type="number" class="form-control @error('volume_A') is-invalid @enderror" id="volume_A"
                            name="volume_A" value="{{ old('volume_A') }}"/>
                        @error('volume_A')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="type_B">Rodzaj badania B</label>
                        <select class="form-control @error('type_B') is-invalid @enderror" id="type_B"
                            name="type_B" aria-label=".form-select-lg example">
                            <option value="0" {{ old('type_A') == 0 ? 'selected' : ''}} > </option>
                            <option value="1" {{ old('type_A') == 1 ? 'selected' : ''}}>Ściskanie</option>
                            <option value="2" {{ old('type_A') == 2 ? 'selected' : ''}}>Wodoszczelność</option>
                            <option value="3" {{ old('type_A') == 3 ? 'selected' : ''}}>Mrozoodporność</option>
                            <option value="4" {{ old('type_A') == 4 ? 'selected' : ''}}>Nasiąkliwość</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="day_B">Dni do badania B</label>
                        <input type="number" class="form-control @error('day_B') is-invalid @enderror" id="day_B"
                            name="day_B" value="{{ old('day_B') }}"/>
                        @error('day_B')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="volume_B">Ilość B</label>
                        <input type="number" class="form-control @error('volume_B') is-invalid @enderror" id="volume_B"
                            name="volume_B" value="{{ old('volume_B') }}"/>
                        @error('volume_B')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="type_C">Rodzaj badania C</label>
                        <select class="form-control @error('type_C') is-invalid @enderror" id="type_C"
                            name="type_C" aria-label=".form-select-lg example">
                            <option value="0" {{ old('type_A') == 0 ? 'selected' : ''}} > </option>
                            <option value="1" {{ old('type_A') == 1 ? 'selected' : ''}}>Ściskanie</option>
                            <option value="2" {{ old('type_A') == 2 ? 'selected' : ''}}>Wodoszczelność</option>
                            <option value="3" {{ old('type_A') == 3 ? 'selected' : ''}}>Mrozoodporność</option>
                            <option value="4" {{ old('type_A') == 4 ? 'selected' : ''}}>Nasiąkliwość</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="day_C">Dni do badania C</label>
                        <input type="number" class="form-control @error('day_C') is-invalid @enderror" id="day_C"
                            name="day_C" value="{{ old('day_C') }}"/>
                        @error('day_C')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="volume_C">Ilość C</label>
                        <input type="number" class="form-control @error('volume_C') is-invalid @enderror" id="volume_C"
                            name="volume_C" value="{{ old('volume_C') }}" />
                        @error('volume_C')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="my_comment">Uwagi/opis</label>
                    <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                        name="my_comment" value="{{ old('my_comment') }}" autocomplete="off"/>
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

                {{-- <div class="form-group">
                    <label for="client_comment">Uwagi Zleceniodawcy</label>
                    <input type="text" class="form-control @error('client_comment') is-invalid @enderror"
                        id="client_comment" name="client_comment" readonly />
                    @error('client_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror
                </div> --}}
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Zapisz protokół</button>
            <a href="{{ route('lists.POBList') }}" class="btn btn-secondary">Anuluj protokół</a>
            </form>
        </div>


@endsection
</div>
