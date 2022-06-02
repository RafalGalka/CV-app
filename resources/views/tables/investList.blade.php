@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista obsługiwanych inwestycji</div>
        <div class="card-body">

            <form class="form-inline" action="{{ route('tables.invest') }}">
                <div class="form-row">
                    <label class="my-1 mr-2" for="phrase">Szukana budowa:</label>
                    <div class="col">
                        <input type="text" class="form-control" name="phrase" placeholder="" value="{{ $phrase ?? '' }}">
                    </div>
                    @php $materialTypes = $materialTypes ?? ''; @endphp
                    <button type="submit" class="btn btn-primary mb-1">Wyszukaj</button>
                    <a href="{{ route('tables.investAdd') }}" role="button" class="btn btn-primary mb-1 ml-2">Dodaj nową
                        inwestycję</a>
                </div>
            </form>

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
                            <th>ID</th>
                            <th>Zleceniodawca</th>
                            <th>Budowa</th>
                            <th>Aktywny</th>
                            <th>Szczegóły</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invest ?? [] as $invest)
                            <tr>
                                <td>{{ $invest->id }}</td>
                                <td>{{ $invest->client->short_name }}</td>
                                <td>{{ $invest->short_name }}</td>
                                <td>@if ($invest->activ == 1)
                                        TAK
                                    @else
                                        NIE
                                    @endif
                                </td>
                                <td><a href="invest/{{ $invest->id }}">szczegóły</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
