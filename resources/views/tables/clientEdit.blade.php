@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header"></h5>Dane klienta</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $clientID->id }}</li>
            <li>Zleceniodawca: {{ $clientID->name }}</li>
            </ul>
        </div>
    </div>


    <div class="card mt-3">

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

            <form action="{{ route('tables.clientUpdate', $clientID->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label for="short_name">Nazwa skrócona</label>
                    <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name"
                        name="short_name" value="{{ old('short_name', $clientID->short_name) }}" />
                    @error('short_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <label for="address">Adres</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $clientID->address) }}" />
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="comment">Komentarz</label>
                        <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                            name="comment" value="{{ old('comment', $clientID->comment) }}">
                        @error('comment')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="activ">Aktywna</label>
                        <select class="form-control input-sm @error('activ') is-invalid @enderror" name="activ">
                            <option {{ old('activ', $clientID->activ) == '0' ? 'selected' : '' }} value="0">Nie</option>
                            <option {{ old('activ', $clientID->activ) == '1' ? 'selected' : '' }} value="1">Tak</option>
                        </select>
                        @error('activ')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz dane</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Anuluj</a>
                </div>
            </form>
        </div>
    </div>
@endsection
