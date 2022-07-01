@extends('layout.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię i nazwisko') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potwierdź hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IDCompany" class="col-md-4 col-form-label text-md-right">{{ __('ID firmy') }}</label>
                            <div class="col-md-6">
                                <input id="IDCompany" type="number" class="form-control @error('IDCompany') is-invalid @enderror" name="IDCompany" value="{{ old('IDCompany') }}" required autocomplete="IDCompany" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IDBudowy" class="col-md-4 col-form-label text-md-right">{{ __('ID budowy') }}</label>
                            <div class="col-md-6">
                                <input id="IDBudowy" type="number" class="form-control @error('IDBudowy') is-invalid @enderror" name="IDBudowy" value="{{ old('IDBudowy') }}" required autocomplete="IDBudowy" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isControl" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik Conrol') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('isControl') is-invalid @enderror" id="isControl" name="isControl"
                                    aria-label=".form-select-lg example">
                                    <option selected value="0">NIE</option>
                                    <option value="1">TAK</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isAuth" class="col-md-4 col-form-label text-md-right">{{ __('Autoryzacja raportów') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('isAuth') is-invalid @enderror" id="isAuth" name="isAuth"
                                    aria-label=".form-select-lg example">
                                    <option selected value="0">NIE</option>
                                    <option value="1">TAK</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Administrator') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('admin') is-invalid @enderror" id="admin" name="admin"
                                    aria-label=".form-select-lg example">
                                    <option selected value="0">NIE</option>
                                    <option value="1">TAK</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nr telefonu') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zarejestruj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
