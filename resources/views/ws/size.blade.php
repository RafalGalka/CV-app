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

                <div> @if ($sample->sample_type == 1) <b>x, y, z od 145,50 do 154,50</b> @elseif ($sample->sample_type == 2) <b>x, y, z od 97,00 do 103,00</b> @else <b>W uwagach wpisać typ prób i wymiary</b> @endif </div>
                <div> Długość <b>x</b> od strony zacieranej do spodu próbki</div>
                <form action="{{ route('wsTests.saveSize') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="x1">x1 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x1') is-invalid @enderror"
                                id="x1" name="x1" />
                        </div>
                        @error('x1')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="x2">x2 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x2') is-invalid @enderror"
                                id="x2" name="x2" />
                        </div>
                        @error('x2')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="x3">x3 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x3') is-invalid @enderror"
                                id="x3" name="x3" />
                        </div>
                        @error('x3')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="y1">y1 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y1') is-invalid @enderror"
                                id="y1" name="y1" />
                        </div>
                        @error('y1')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="y2">y2 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y2') is-invalid @enderror"
                                id="y2" name="y2" />
                        </div>
                        @error('y2')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="y3">y3 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y3') is-invalid @enderror"
                                id="y3" name="y3" />
                        </div>
                        @error('y3')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="x4">x4 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x4') is-invalid @enderror"
                                id="x4" name="x4" />
                        </div>
                        @error('x4')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                        <div class="form-group col-md-2">
                            <label for="x5">x5 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x5') is-invalid @enderror"
                                id="x5" name="x5" />
                        </div>
                        @error('x5')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="x6">x6 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('x6') is-invalid @enderror"
                                id="x6" name="x6" />
                        </div>
                        @error('x6')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="y4">y4 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y4') is-invalid @enderror"
                                id="y4" name="y4" />
                        </div>
                        @error('y4')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                        <div class="form-group col-md-2">
                            <label for="y5">y5 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y5') is-invalid @enderror"
                                id="y1" name="y5" />
                        </div>
                        @error('y5')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="y6">y6 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('y6') is-invalid @enderror"
                                id="y6" name="y6" />
                        </div>
                        @error('y6')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="z1">z1 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('z1') is-invalid @enderror"
                                id="z1" name="z1" />
                        </div>
                        @error('z1')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="z2">z2 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('z2') is-invalid @enderror"
                                id="z2" name="z2" />
                        </div>
                        @error('z2')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="z3">z3 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('z3') is-invalid @enderror"
                                id="z3" name="z3" />
                        </div>
                        @error('z3')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-md-2">
                            <label for="z4">z4 [mm]</label>
                            <input type="number" step="0.01" class="form-control @error('z4') is-invalid @enderror"
                                id="z4" name="z4" />
                        </div>
                        @error('z4')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="perpendicularity">Prostopadłość (0,5mm)</label>
                            <select class="form-control @error('perpendicularity') is-invalid @enderror" id="perpendicularity"
                                name="perpendicularity" aria-label=".form-select-lg example">
                                <option selected value=1>Pozytywny</option>
                                <option value=0>Negatywny</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="flatness">Płaskość (0,09mm)</label>
                            <select class="form-control @error('flatness') is-invalid @enderror" id="flatness"
                                name="flatness" aria-label=".form-select-lg example">
                                <option selected value=1>Pozytywny</option>
                                <option value=0>Negatywny</option>
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
                    </div>

                        <div class="form-row">
                            <input type="number" step="0.01" class="form-control @error('size') is-invalid @enderror" id="size"
                                name="size" readonly hidden value={{$size}} />
                            @error('size')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <input type="number" class="form-control @error('sample_id') is-invalid @enderror" id="sample_id"
                            name="sample_id" readonly hidden value={{$sample->id}} />
                        </div>

            </div>
            <button type="submit" class="btn btn-primary">Zapisz wymiary próbki i zbadaj</button>
            <a href="{{ route('home.mainPage') }}" class="btn btn-secondary">Anuluj zmiany</a>
            </form>
        </div>
    </div>
@endsection
