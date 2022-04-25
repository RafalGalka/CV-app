@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header"></h5>Dodawnie nowego Zleceniodawcy</h5>
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

            <form action="{{ route('tables.clientAdd') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <label for="short_name">Nazwa skrótowa</label>
                    <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name"
                        name="short_name" />
                    @error('short_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <label for="name">Pełna nazwa</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address">
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="comment">Komentarz</label>
                    <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                        name="comment">
                    @error('comment')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="activ">Aktywna</label>
                    <select class="form-control input-sm @error('activ') is-invalid @enderror" name="activ">
                        <option value=1>TAK</option>
                        <option value=0>NIE</option>
                    </select>
                    @error('activ')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('tables.client') }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
