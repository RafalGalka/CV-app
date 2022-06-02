@extends('layout.main')

@section('content')
    <h2 class="mt-4">Panel dodawania protokołów</h2>

    <div>
        Witaj: {{ $user->name }}
    </div>

    <form action="{{ route('protocols.newNumber') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
        <div class="row-x row-xl-3 row-md-3 mb-4">
            <button class="btn mb-6" type="submit" value="PO" name="name">
                <div class="card border-left shadow-sm py-2 h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Protokół pobrania
                                    F-PPOB</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </button>

            <button class="btn mb-6" type="submit" name="name" value="OD">
                <div class="card border-left-primary shadow-sm py-2 h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Protokół odbioru prób
                                    F-ODB</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </div>

        <div class="row-x row-xl-3 row-md-3 mb-4">
            <button class="btn mb-6" type="submit" name="name" value="ZS">
                <div class="card border-left-primary shadow-sm py-2 h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pobranie
                                    szlichty/zaprawy F-ZS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </button>

            <button class="btn mb-6" type="submit" name="name" value="Ot">
                <div class="card border-left-primary shadow-sm py-2 h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inny protokół
                                    pobrania</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </button>

        </div>
    </div>
    @endsection
