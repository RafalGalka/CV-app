@extends('layout.main')

@section('content')

    <div class="card mt-3">
        <h5 class="card-header">Nr protokołu {{ $_GET["nr"] }} z {{ $protocol->date }}. Budowa {{$protocol->invest->short_name}}</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-row">
                <div class="form-group col-md-12">
                    <h5>Ilości prób łącznie: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples+$N_samples+$F_samples}} , pozostało: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples+$N_samples+$F_samples-$nr}}</h5>
                    <h6>Zalecane: 150x150x150: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples}}, 100x100x100: {{$F_samples+$N_samples}}</h6>
                    <h6>Próbki do badania ściskania: 28d: {{$protocol->days_28}}, Ś56: {{$protocol->days_56}}, inne: {{$strenght_samples}} </h6>
                </div>
            </div>

            <form action="{{ route('samples.save') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <div class="form-row">
                        <input type="hidden" name="protocol_number" value={{$protocol->protocol_number}}>

                        <div class="form-group col-md-2">
                            <label for="number">Ilość prób</label>
                            <input type="number" class="form-control @error('number') is-invalid @enderror"
                                id="number" name="number" value="{{ old('number') }}" autocomplete="off"/>
                            @error('number')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="sample_type">Typ prób</label>
                            <select class="form-control @error('sample_type') is-invalid @enderror" id="sample_type"
                                name="sample_type" aria-label=".form-select-lg example">
                                <option value="1">150x150x150</option>
                                <option value="2">100x100x100</option>
                                <option value="3">inny</option>
                            </select>
                            @error('sample_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="init">Godzina pobr.</label>
                            <input type="time" class="form-control @error('hour') is-invalid @enderror"
                                id="hour" name="hour" value="{{ old('hour', $time) }}" />
                            @error('hour')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="wz_number">Nr WZ</label>
                            <input type="text" class="form-control @error('wz_number') is-invalid @enderror"
                                id="wz_number" name="wz_number" value="{{ old('wz_number') }}" autocomplete="off"/>
                            @error('wz_number')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="consistency">Opad stożka[mm]</label>
                            <input type="number" class="form-control @error('consistency') is-invalid @enderror"
                                id="consistency" name="consistency" value="{{ old('consistency') }}" />
                            @error('consistency')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="temperature">Temp. miesz.[&#176;C]</label>
                            <input type="float" class="form-control @error('temperature') is-invalid @enderror"
                                id="temperature" name="temperature" autocomplete="off" value="{{ old('temperature') }}" />
                            @error('temperature')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="air_content">Zaw. powietrza[%]</label>
                            <input type="float" class="form-control @error('air_content') is-invalid @enderror"
                                id="air_content" name="air_content" autocomplete="off" value="{{ old('air_content') }}" />
                            @error('air_content')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="reinforcement_volume">Ilość zbr.rozpr.[kg/m&sup3;]</label>
                            <input type="float" class="form-control @error('reinforcement_volume') is-invalid @enderror"
                                id="reinforcement_volume" name="reinforcement_volume" autocomplete="off" value="{{ old('reinforcement_volume') }}"/>
                            @error('reinforcement_volume')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="my_comment">Uwagi/opis</label>
                    <input type="text" class="form-control @error('my_comment') is-invalid @enderror" id="my_comment"
                        name="my_comment" autocomplete="off" value="{{ old('my_comment') }}"/>
                    @error('my_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mt-3">
                    <button type="submit" name="add" value="next" class="btn btn-success">Zapisz próbki</button>
                </div>

                <div class="mt-3">
                    <button type="submit" name="add" value="end" class="btn btn-primary">Wyjdź</button>
                    <a href="{{ route('lists.POBEdit', array('pobID' => $protocol->id)) }}" class="btn btn-primary">Edytuj protokół</a>
                </div>
            </form>
        </div>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Oznaczenie</th>
                    <th>Typ prób</th>
                    <th>Nr WZ</th>
                    <th>Konsystencja</th>
                    <th>Zaw. powietrza</th>
                    <th>Akcje</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($save_samples ?? [] as $sample)
                    <tr>
                        <td> @if(isset($sample->number)) @for ($i=1; $i<=$sample->number; $i++)
                                @if($i<$sample->number)
                            {{ ++$nrr . ', ' }} @else {{ ++$nrr }} @endif
                            @endfor
                            @else 0 @endif
                        </td>
                        <td> @if(isset($sample->sample_type))
                            @if ( $sample->sample_type == 1) 15x15x15 @elseif ( $sample->sample_type == 2 ) 10x10x10 @else inny
                                @endif
                            @else -
                            @endif </td>
                        <td> @if(isset($sample->wz_number)) {{ $sample->wz_number }} @else - @endif </td>
                        <td> @if(isset($sample->consistency)) {{ $sample->consistency }} @else - @endif </td>
                        <td> @if(isset($sample->air_content)) {{ $sample->air_content }} @else - @endif </td>
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
    </div>
@endsection
