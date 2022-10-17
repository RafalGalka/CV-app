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
                            @foreach ($invests as $invest)
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
                                <td> @if(isset($protocol->invest->short_name)) {{ $protocol->invest->short_name }} @elseif(isset($protocol->invest->name)) {{ $protocol->invest->name }} @else "-" @endif </td>
                                <td>
                                    <a href="POB/ {{ $protocol->id }}">Szczegóły</a> / @if (!isset($protocol->collection)) <a class='btn btn-warning btn-sm' href={{ route('tests.select', ['protocol' => $protocol->protocol_number]) }}> ! </a> @else <a class='btn btn-success btn-sm' href={{ route('tests.edit', ['protocol' => $protocol->protocol_number]) }}> ok </a> @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{ $protocols->links() }}
        </div>
    </div>
@endsection
