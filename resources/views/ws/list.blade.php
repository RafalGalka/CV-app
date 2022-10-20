@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista prób</div>
        <div class="card-body">

            {{-- <div class="form-row">
                <a href="{{ route('equipment.check') }}" role="button" class="btn btn-primary mb-1 ml-2">Sprawdzenie urządzeń</a>
            </div> --}}

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
                            <th>Nr próbki</th>
                            <th>Data badania</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples ?? [] as $sample)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sample->protocol_number }} / {{ $sample->sample_nr }}</td>
                                <td>{{ $sample->test_age }}</td>
                                <td>@if ($sample->tested == 0)
                                    <a href="{{ route('wsTests.size', ['id' => $sample->id])}}"> Do badania!
                                    @else
                                        <a href="#"> Próbka przebadana
                                @endif
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
