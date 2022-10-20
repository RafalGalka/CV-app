@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Próbki do protokołu nr <b>{{ $protocol_number }}</b>, budowa: <b> {{ $protocolPOB->invest->short_name }} </b></div>
        <div class="card-body">
            <div class="table-responsive">
                <ul>
                    @if (isset($protocolPOB->days_28))
                        <li>Wytrzymałość 28 dni: <b>{{$protocolPOB->days_28}}</b> próbek/ki</li>
                    @endif
                    @if (isset($protocolPOB->days_56))
                        <li>Wytrzymałość 56 dni: <b>{{$protocolPOB->days_56}}</b> próbek/ki</li>
                    @endif
                    @if (isset($protocolPOB->days_7))
                        <li>Wytrzymałość 7 dni: <b>{{$protocolPOB->days_7}}</b> próbki</li>
                    @endif
                    @if (isset($protocolPOB->volume_phone))
                        <li>Badanie na zgłoszenie tel.: <b>{{$protocolPOB->volume_phone}}</b> próbki</li>
                    @endif
                    @if (isset($protocolPOB->volume_W))
                        <li>Wodoszczelność {{$recipe->waterproof}}/{{$recipe->w_days}} dni: <b>{{$protocolPOB->volume_W}}</b> próbek</li>
                    @endif
                    @if ($protocolPOB->type_A > 0)
                        <li>{{$protocolPOB->type_A}}/{{$protocolPOB->day_A}} dni: <b>{{$protocolPOB->volume_A}}</b> próbek/ki</li>
                    @endif
                    @if ($protocolPOB->type_B > 0)
                        <li>{{$protocolPOB->type_B}}/{{$protocolPOB->day_B}} dni: <b>{{$protocolPOB->volume_B}}</b> próbek/ki</li>
                    @endif
                        @if ($protocolPOB->type_C > 0)
                        <li>{{$protocolPOB->type_C}}/{{$protocolPOB->day_C}} dni: <b>{{$protocolPOB->volume_C}}</b> próbek/ki</li>
                    @endif
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ozn.</th>
                            <th>Nr WZ</th>
                            <th>Konsystencja</th>
                            <th>Typ prób</th>
                            <th>Rodzaj badania</th>
                        </tr>
                    </thead>

                    <tbody>
                        <form method="POST" action="{{ route('tests.save') }}">
                            @csrf
                            @foreach ($samples ?? [] as $sample)
                                @for ($i=1; $i<=$sample->number; $i++)
                                    <tr>
                                        <td> @if(isset($sample->number))
                                            @if($i<$sample->number)
                                        {{ $sample->protocol_number . '/' . ++$nrr }} @else {{ $sample->protocol_number . '/' . ++$nrr . ';'}} @endif

                                        @else 0 @endif
                                        </td>
                                        <td> @if(isset($sample->wz_number)) {{ $sample->wz_number }} @else - @endif </td>
                                        <td> @if(isset($sample->consistency)) {{ $sample->consistency }} @else - @endif </td>
                                        <td> @if(isset($sample->sample_type)) @if ($sample->sample_type == 1) 150x150x150 @elseif ($sample->sample_type == 2) 100x100x100 @else inne @endif @else - @endif </td>
                                        <td>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type{{$nrr}}" name="type{{$nrr}}"
                                            aria-label=".form-select-lg example">
                                                <option value=0 {{ old('type') == 0 ? 'selected' : ''}} ></option>
                                                @if ($protocolPOB->days_28 > 0)
                                                    <option value=128 {{ old('type') == 1 ? 'selected' : ''}} >Ś28</option>
                                                @endif
                                                @if ($protocolPOB->days_56 > 0)
                                                    <option value=156 {{ old('type') == 2 ? 'selected' : ''}} >Ś56</option>
                                                @endif
                                                @if ($protocolPOB->days_7 > 0)
                                                    <option value=107 {{ old('type') == 3 ? 'selected' : ''}} >Ś7</option>
                                                @endif
                                                @if ($protocolPOB->volume_phone > 0)
                                                    <option value=100 {{ old('type') == 4 ? 'selected' : ''}} >Śtel</option>
                                                @endif
                                                @if ($protocolPOB->volume_W > 0)
                                                    <option value={{2 . $recipe->waterproof}}  {{ old('type') == 5 ? 'selected' : ''}} >{{$recipe->waterproof}}/{{$recipe->w_days}} dni</option>
                                                @endif
                                                @if ($protocolPOB->type_A > 0)
                                                    <option value={{ $protocolPOB->type_A . $protocolPOB->day_A }} {{ old('type') == $protocolPOB->type_A . $protocolPOB->day_A ? 'selected' : ''}} > @if ( $protocolPOB->type_A == 1 ) {{ 'Ś/' . $protocolPOB->day_A . 'dni' }} @elseif ( $protocolPOB->type_A == 2 ) {{ 'Wxx/' . $protocolPOB->day_A . 'dni' }} @elseif ( $protocolPOB->type_A == 3 ) {{ 'Fxxx/' . $protocolPOB->day_A . 'dni' }} @else {{ 'N/' . $protocolPOB->day_A . 'dni' }} @endif </option>
                                                @endif
                                                @if ($protocolPOB->type_B > 0)
                                                    <option value={{ $protocolPOB->type_B . $protocolPOB->day_B }} {{ old('type') == $protocolPOB->type_B . $protocolPOB->day_B ? 'selected' : ''}} > @if ( $protocolPOB->type_B == 1 ) {{ 'Ś/' . $protocolPOB->day_B . 'dni' }} @elseif ( $protocolPOB->type_B == 2 ) {{ 'Wxx/' . $protocolPOB->day_B . 'dni' }} @elseif ( $protocolPOB->type_B == 3 ) {{ 'Fxxx/' . $protocolPOB->day_B . 'dni' }} @else {{ 'N/' . $protocolPOB->day_B . 'dni' }} @endif</option>
                                                @endif
                                                @if ($protocolPOB->type_C > 0)
                                                    <option value={{ $protocolPOB->type_C . $protocolPOB->day_C }} {{ old('type') == $protocolPOB->type_C . $protocolPOB->day_C ? 'selected' : ''}} > @if ( $protocolPOB->type_C == 1 ) {{ 'Ś/' . $protocolPOB->day_C . 'dni' }} @elseif ( $protocolPOB->type_C == 2 ) {{ 'Wxx/' . $protocolPOB->day_C . 'dni' }} @elseif ( $protocolPOB->type_C == 3 ) {{ 'Fxxx/' . $protocolPOB->day_C . 'dni' }} @else {{ 'N/' . $protocolPOB->day_C . 'dni' }} @endif</option>
                                            @endif
                                            </select>
                                        </td>

                                    </tr>
                                    <input type="number" class="form-control @error('protocol_nr') is-invalid @enderror"
                            id="max" name="max" value="{{ $nrr }}" hidden />
                                @endfor
                            @endforeach
                            <input type="number" class="form-control @error('protocol_nr') is-invalid @enderror"
                            id="protocol_nr" name="protocol_nr" value="{{ $protocol_number }}" hidden />
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                            id="date" name="date" value="{{ $protocolPOB->date }}" hidden />
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" name="btn" value="save">Akceptacja do badań</button>
                <a href="{{ route('lists.POBList') }}" class="btn btn-secondary">Cofnij</a>
            </form>
            </div>
        </div>
    </div>
@endsection
