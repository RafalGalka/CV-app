@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Szczegółowe dane inwestycji</h5>
        <div class="card-body">
            <ul></ul>
            <li>Id: {{ $investID->id }}</li>
            <li>Zleceniodawca: {{ $investID->client->short_name }}</li>
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

            <form action="{{ route('tables.investUpdate', $investID->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label for="name">Inwestycja</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $investID->name) }}" />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <label for="short_name">Nazwa skrócona</label>
                    <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name"
                        name="short_name" value="{{ old('short_name', $investID->short_name) }}" />
                    @error('short_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="detail_picking">Szczegóły pobierania</label>
                    <input type="text" class="form-control @error('detail_picking') is-invalid @enderror"
                        id="detail_picking" name="detail_picking"
                        value="{{ old('detail_picking', $investID->detail_picking) }}">
                    @error('detail_picking')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="comment">Komentarz</label>
                    <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                        name="comment" value="{{ old('comment', $investID->comment) }}">
                    @error('comment')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="activ">Aktywna</label>
                    <select class="form-control input-sm @error('activ') is-invalid @enderror" name="activ">
                        <option {{ old('activ', $investID->activ) == '0' ? 'selected' : '' }} value="0">Nie</option>
                        <option {{ old('activ', $investID->activ) == '1' ? 'selected' : '' }} value="1">Tak</option>
                    </select>
                    @error('activ')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
