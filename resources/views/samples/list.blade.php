@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Próbki do protokołu nr <b>{{ $protocol }}</b> </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ozn.</th>
                            <th>Nr WZ</th>
                            <th>Konsystencja</th>
                            <th>Typ prób</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($samples ?? [] as $sample)
                            <tr>
                                <td> @if(isset($sample->number)) @for ($i=1; $i<=$sample->number; $i++)
                                    @if($i<$sample->number)
                                {{ ++$nrr . ', ' }} @else {{ ++$nrr }} @endif
                                @endfor
                                @else 0 @endif
                            </td>
                                <td> @if(isset($sample->wz_number)) {{ $sample->wz_number }} @else - @endif </td>
                                <td> @if(isset($sample->consistency)) {{ $sample->consistency }} @else - @endif </td>
                                <td>
                                    <form method="POST" action="{{ route('samples.delete', $sample->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/samples/add?nr={{$protocol}}" class="btn btn-xs btn-primary btn-flat show_confirm" type="button">Dodaj / edytuj</a>
            </div>
        </div>
    </div>
@endsection
