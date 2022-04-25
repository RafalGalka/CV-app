@extends('layout.main')

@section('content')
<h2 class="mt-4">Panel tabeli</h2>

<div>
  Witaj: {{ $user->name }}
</div>

<div class="row mt-3">
  <a class="btn col-x col-xl-3 col-md-6 mb-4" href="{{ route('tables.invest') }}" role="button">
    <div class="card border-left shadow-sm py-2 h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inwestycje</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </a>
  <a class="btn col-x col-xl-3 col-md-6 mb-4" href="{{ route('tables.client') }}" role="button">
    <div class="card border-left shadow-sm py-2 h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Zleceniodawcy</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </a>
  <a class="btn col-x col-xl-3 col-md-6 mb-4" href="{{ route('tables.strenghtClass') }}" role="button">
    <div class="card border-left-primary shadow-sm py-2 h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Klasy wytrzymałościowe</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
    </div>
  </a>

  <a class="btn col-x col-xl-3 col-md-6 mb-4" href="{{ route('tables.workType') }}" role="button">
    <div class="card border-left-primary shadow-sm py-2 h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tabela zadań</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
@endsection