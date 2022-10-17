@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Wybierz datę badania lub nr protokołu</div>
        <div class="card-body">
            <form action="{{ route('wsTests.list') }}">
                <div class="form-group col-md-4">
                    <label for="protocol_nr">Nr protokołu pobrania</label>
                    <input type="number" class="form-control" id="protocol_nr"
                        name="protocol_nr" value="{{ old('protocol_nr') }}" autocomplete="off"/>
                    @error('protocol_nr')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror
                    <button type="submit" name="btn" value="nr" class="btn btn-primary mb-2 mt-3">Wyszukaj</button>
                </div>

                <div class="form-group col-md-4">
                    <label for="testDate">Data badania</label>
                    <input type="date" class="form-control @error('testDate') is-invalid @enderror" id="testDate"
                        name="testDate" value="{{ old('testDate', $today) }}"/>
                    @error('testDate')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror
                    <button type="submit" name="btn" value="date" class="btn btn-primary mb-2 mt-3">Wyszukaj</button>
                </div>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
