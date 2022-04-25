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

            <form action="{{ route('protocols.protocolFPZS') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <div class="form-row">
                        <div class="form-group col-sd-3">
                            <label for="protocol_number">Numer protokołu</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                id="protocol_number" name="protocol_number" value="{{ $nrProt }}" readonly />
                        </div>
                        @error('protocol_number')
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
                        <div class="form-group col-sd-3">
                            <label for="date">Data pobrania</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ $today }}" />
                        </div>
                        @error('date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-3">
                            <label for="time">Czas pobrania</label>
                            <input type="time" class="form-control @error('time') is-invalid @enderror" id="time"
                                name="time" />
                            @error('time')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="client_id">Zleceinodawca</label>
                            <select class="form-control @error('client_id') is-invalid @enderror" id="client_id"
                                name="client_id">
                                <option value="sss"> --wybierz-- </option>
                                @foreach ($client as $row)
                                    <option value={{ $row->id }}>{{ $row->short_name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
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
                        </div>
                        @error('invest_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="recipe">Receptura</label>

                            <input type="text" class="form-control @error('recipe') is-invalid @enderror" id="recipe"
                                name="recipe" />

                        </div>
                        @error('recipe')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-3">
                            <label for="compression_class">Klasa ściskania</label>
                            <select class="form-control @error('compression_class') is-invalid @enderror"
                                id="compression_class" name="compression_class">
                                <option value=""> --wybierz-- </option>
                                @foreach ($classC as $row)
                                    <option value={{ $row->id }}>{{ $row->strenght_class }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('compression_class')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-sd-3">
                            <label for="bending_class">Klasa zginania</label>
                            <select class="form-control @error('bending_class') is-invalid @enderror" id="bending_class"
                                name="bending_class">
                                <option value=""> --wybierz-- </option>
                                @foreach ($classB as $row)
                                    <option value={{ $row->id }}>{{ $row->strenght_class }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('bending_class')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="element">Elementy</label>
                        <input type="text" class="form-control @error('element') is-invalid @enderror" id="element"
                            name="element" />
                        @error('element')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label for="days_28">28 dni</label>
                            <input type="number" class="form-control @error('days_28') is-invalid @enderror" id="days_28"
                                name="days_28" />
                            @error('days_28')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="days_7">7 dni</label>
                            <input type="number" class="form-control @error('days_7') is-invalid @enderror" id="days_7"
                                name="days_7" />
                            @error('days_7')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="days_56">56 dni</label>
                            <input type="number" class="form-control @error('days_56') is-invalid @enderror" id="days_56"
                                name="days_56" />
                            @error('days_56')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
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
                    <label for="client_comment">Komentarz Zleceniodawcy</label>
                    <input type="text" class="form-control @error('client_comment') is-invalid @enderror"
                        id="client_comment" name="client_comment" readonly />
                    @error('client_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz protokół</button>
                <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj protokół</a>
            </form>
        </div>
    </div>
@endsection
