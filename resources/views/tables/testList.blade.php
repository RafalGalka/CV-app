@extends('layout.main')

@section('content')
<div class="card mt-3">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Rodzaje badań betonu</div>
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

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Lp</th>
            <th>Nazwa badania</th>
            <th>Komentarz</th>
            <th>Widoczny</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testType ?? [] as $test)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $test->test_name }}</td>
            <td>{{ $test->comments ?? 'brak' }}</td>
            <td>
              {{ $test->activ ?? 'brak' }}
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection