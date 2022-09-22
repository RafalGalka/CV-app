@extends('layout.main')

@section('content')

    <div class="card mt-3">
        <h5 class="card-header">Nr protokołu {{ $_GET["nr"] }} z {{ $protocol->date }}. Budowa: {{$protocol->invest->short_name}}</h5>
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
                    <h5>Ilości prób łącznie: {{$protocol->number_of_sample}} , pozostało: {{$protocol->number_of_sample-2}}</h5>
                </div>
            </div>

            <form action="{{ route('sample.save') }}" method="post" enctype="multipart/form-data">
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

                        <div class="form-group col-md-3">
                            <label for="picking_date">Data pobrania</label>
                            <input type="date" class="form-control @error('picking_date') is-invalid @enderror" id="picking_date"
                                name="picking_date" value="{{ old('date') }}"/>
                        </div>
                        @error('picking_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="mark">Nr receptury</label>
                            <input type="text" class="form-control @error('mark') is-invalid @enderror"
                                id="mark" name="mark" value="{{ old('mark') }}" autocomplete="off"/>
                            @error('mark')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="compression_class">Klasa wytrzymałości</label>
                            <select class="form-control @error('type_A') is-invalid @enderror" id="compression_class"
                                name="compression_class" aria-label=".form-select-lg example">
                                <option value=""> --wybierz-- </option>
                                @foreach ($classes as $class)
                                    <option value={{ $class->id }}>{{ $class->strenght_class }}</option>
                                @endforeach
                            </select>

                            @error('compression_class')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="element">Elementy <i>(informacje od Zleceniodawcy)</i></label>
                        <textarea class="form-control @error('element') is-invalid @enderror" id="element" name="element"
                            rows="2" autocomplete="off"> {{ old('element') }} </textarea>
                        @error('element')
                            <div class=" invalid-feedback d-block">{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="test_type">Rodzaj badania</label>
                            <select class="form-control @error('type_A') is-invalid @enderror" id="test_type"
                                name="test_type" aria-label=".form-select-lg example">
                                <option value="1" {{ old('test_type') == 1 ? 'selected' : ''}}>Ściskanie</option>
                                <option value="2" {{ old('test_type') == 2 ? 'selected' : ''}}>Wodoszczelność W8</option>
                                <option value="3" {{ old('test_type') == 3 ? 'selected' : ''}}>Wodoszczelność W10</option>
                                <option value="4" {{ old('test_type') == 4 ? 'selected' : ''}}>Mrozoodporność F150</option>
                                <option value="5" {{ old('test_type') == 5 ? 'selected' : ''}}>Mrozoodporność F200</option>
                                <option value="6" {{ old('test_type') == 6 ? 'selected' : ''}}>Nasiąkliwość</option>
                                <option value="7" {{ old('test_type') == 7 ? 'selected' : ''}}>Inne</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="test_time">Dni do badania</label>
                            <input type="number" class="form-control @error('test_time') is-invalid @enderror" id="test_time"
                                name="test_time" value="{{ old('test_time', 28) }}"/>
                            @error('test_time')
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

                    <label for="client_comment">Uwagi Zleceniodawcy</label>
                    <input type="text" class="form-control @error('client_comment') is-invalid @enderror" id="client_comment"
                        name="client_comment" autocomplete="off" value="{{ old('client_comment') }}" readonly/>
                    @error('client_comment')
                        <div class=" invalid-feedback d-block">{{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mt-3">
                    <button type="submit" name="add" value="next" class="btn btn-success">Zapisz próbki</button>
                    <button type="submit" name="add" value="copy" class="btn btn-success">Zapisz próbki i kopiuj dane</button>
                </div>

                <div class="mt-3">
                    <button type="submit" name="add" value="end" class="btn btn-primary">Wyjdź</button>
                    <a href="{{ route('lists.ODBEdit', array('pobID' => $protocol->id)) }}" class="btn btn-primary">Zapisz i edytuj protokół</a>
                </div>
            </form>
        </div>

        @if (isset($data)) @dd($data) @else - @endif

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Oznaczenie</th>
                    <th>Data pobrania</th>
                    <th>Rodzaj badania</th>
                    <th>Klasa wytrz.</th>
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
                        <td> @if(isset($sample->picking_date)) {{ $sample->picking_date }} @else - @endif </td>
                        <td> @switch($sample->test_type)
                            @case(1)
                                Ś
                                @break
                            @case(2)
                                W8
                                @break
                            @case(3)
                                W10
                                @break
                            @case(4)
                                F150
                                @break
                            @case(5)
                                F200
                                @break
                            @case(6)
                                Nasiąkliwość
                                @break
                            @default
                                Inne
                        @endswitch
                            @if(isset($sample->test_time)) {{ $sample->test_time }} @else - @endif </td>
                        <td> @if(isset($sample->class->strenght_class)) {{ $sample->class->strenght_class }} @else - @endif </td>
                        <td>
                            <form method="POST" action="{{ route('sample.delete', $sample->id) }}">
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
