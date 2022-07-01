@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Protokoły pobrań</div>

            <form class="form-inline" action="{{ route('tables.invest') }}">
                <div class="form-row">
                    @php $investm = $investm ?? ''; @endphp
                    <div class="col-auto">
                        <select class="form-control input-sm @error('investm') is-invalid @enderror" name="investm">
                            <option @if ($investm == 'all') selected @endif value="all">Wybór inwestycji</option>
                            @foreach ($invest as $invest)
                                <option value="{{ $invest->id }}">{{ $invest->short_name }}</option>
                            @endforeach
                        </select>
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
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nr protokołu</th>
                            <th>Data pobrania</th>
                            <th>Budowa</th>
                            <th>Szczegóły</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($protocols ?? [] as $protocol)
                            <tr>
                                <td>{{ $protocol->protocol_number }}</td>
                                <td>{{ $protocol->date }}</td>
                                <td>{{ $protocol->invest->short_name }}</td>
                                <td>
                                    <a href="lists/ODB/ {{ $protocol->id }}">Szczegóły
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
