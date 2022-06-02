@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista Zleceniodawców</div>
        <div class="card-body">

            <div class="form-row">
                <a href="{{ route('tables.clientAdd') }}" role="button" class="btn btn-primary mb-1 ml-2">Dodaj
                    Zleceniodawcę</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>lp</th>
                            <th>Zleceniodawca</th>
                            <th>Aktywny</th>
                            <th>Szczegóły</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client ?? [] as $client)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->short_name }}</td>
                                <td>@if ($client->activ == 1)
                                    TAK
                                @else
                                    NIE
                                @endif
                            </td>
                                <td>
                                    <a href="client/{{ $client->id }}">Szczegóły
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
