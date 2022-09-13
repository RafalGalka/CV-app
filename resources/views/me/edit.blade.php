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

            <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- X-XSRF-TOKEN
                                    @if ($user->avatar)
    <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar">
@else
    <img src="/images/avatar.png" class="rounded mx-auto d-block">
    @endif




                                        <div class="form-group">
                                            <label for="avatar">Wybierz avatar ...</label>
                                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                                            @error('avatar')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                                        </div>

                                        -->

                <div class="form-group">

                    <label for="name">Imię i nazwisko</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <label for="IDCompany">Nazwa firmy</label>
                    <input type="text" class="form-control @error('IDCompany') is-invalid @enderror" id="IDCompany"
                        name="IDCompany" value="{{ $user->client->short_name }}" readonly />
                    @error('IDCompany')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email">Adres email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('me.profile') }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
