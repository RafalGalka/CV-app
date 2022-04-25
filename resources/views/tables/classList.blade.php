@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Klasy wytrzymałościowe</div>
        <div class="card-body">

            <form class="form-inline" action="{{ route('tables.strenghtClass') }}">
                <div class="form-row">
                    @php $material_types = $material_types ?? ''; @endphp
                    <div class="col-auto">
                        <select class="custom-select mr-sm-2" name="material_types">
                            <option @if ($material_types == 'all') selected @endif value="all">Wszystkie rodzaje</option>
                            <option @if ($material_types == 'beton') selected @endif value="beton">Beton</option>
                            <option @if ($material_types == 'podkład-ściskanie') selected @endif value="podkład-ściskanie">
                                Podkład-ściskanie</option>
                            <option @if ($material_types == 'podkład-zginanie') selected @endif value="podkład-zginanie">
                                Podkład-zginanie</option>
                            <option @if ($material_types == 'zaprawa') selected @endif value="zaprawa">Zaprawa</option>
                            <option @if ($material_types == 'stabilizacja') selected @endif value="stabilizacja">Stabilizacja
                            </option>
                            <option @if ($material_types == 'podbudowa') selected @endif value="podbudowa">Podbudowa</option>
                            <option @if ($material_types == 'other') selected @endif value="other">Inne</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-1">Wyszukaj</button>
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
                            <th>Lp</th>
                            <th>Klasa wytrzymałości</th>
                            <th>Rodzaj materiału</th>
                            <th>Aktywny</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($strenghtClass ?? [] as $class)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $class->strenght_class }}</td>
                                <td>{{ $class->material_types }}</td>
                                <td>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label
                                            class="btn @if ($class->activ == 1) btn-primary @else btn-secondary @endif active">
                                            <input type="radio" name="options" id="option1" autocomplete="off"
                                                @if ($class->activ == 1) checked @endif>
                                            TAK
                                        </label>
                                        <label
                                            class="btn @if ($class->activ == 0) btn-primary @else btn-secondary @endif active">
                                            <input type="radio" name="options" id="option2" autocomplete="off"
                                                @if ($class->activ == 0) checked @endif> NIE
                                        </label>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
