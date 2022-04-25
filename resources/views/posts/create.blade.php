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

      <div class="form-group">

        <div class="form-group">
          <label for="avatar">Dodaj zdjęcie WZ ...</label>
          <input type="file" class="form-control-file" id="WZ" name="WZ">
          @error('WZ')
          <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
        </div>

        <label for="name">Zleceniodawca</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <label for="company">Adres budowy</label>
        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $user->company) }}" />
        @error('company')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

      </div>
      <div class="form-group">
        <label for="company">Adres budowy</label>
        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $user->company) }}" />
        @error('company')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <label for="company">Data pobrania</label>
        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $user->company) }}" />
        @error('company')

        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <label for="company">Adres budowy</label>
        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $user->company) }}" />
        @error('company')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">Telefon</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
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