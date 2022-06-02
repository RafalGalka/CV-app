@extends('layout.main')

@section('content')
    <h2 class="mt-4"> Harmonogramy pobrań </h2>

        <div class="row mt-3 p-3">

            <div class="d-flex p-3">
                <a href="{{ route('lists.ODBList') }}" class="btn btn-primary btn-lg active" role="button">Protokoły F-ODB </a>
            </div>
            <div class="d-flex p-3">
                <a href="{{ route('lists.ZSList') }}" class="btn btn-primary btn-lg active" role="button">Protokoły F-ZS </a>
            </div>
            <div class="d-flex p-3">
                <a href="{{ route('lists.OtList') }}" class="btn btn-primary btn-lg active" role="button">Protokoły inne </a>
            </div>
    @endsection
