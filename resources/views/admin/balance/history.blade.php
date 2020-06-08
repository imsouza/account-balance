{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'History')

@section('content_header')
  <h1 class="lead">History</h1>
@stop

@section('content')
  <div class="card">
  	<div class="card-header">
      <form action="{{ route('history.filter') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="id" class="form-control" placeholder="ID">
        <input type="date" name="date" class="form-control">
        <select name="type" class="form-control">
          <option value="">-- Select Type --</option>
          @foreach ($types as $key => $type)
            <option value="{{ $key }}">{{ $type }}</option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-primary form-control">Filter</button>
      </form>
  	</div>
  	<div class="card-body">
      <table class="table text-center table-responsive-md table-responsive-xs table-responsive-sm table-bordered table-hover table-striped">
        <thead>
          <tr class="text-info">
            <th>#</th>
            <th>Value</th>
            <th>Type</th>
            <th>Date</th>
            <th>Sender</th>
          </tr>
        </thead>
        <tbody>
          @forelse($historys as $history)
          <tr>
            <td>{{ $history->id }}</td>
            <td>{{ number_format($history->amount, 2, '.', '') }}</td>
            <td>{{ $history->type($history->type) }}</td>
            <td>{{ $history->date }}</td>
            <td>
              @if ($history->user_id_transaction)
                {{ $history->userSender->name }}
              @else
                -
              @endif
            </td>
          </tr>
          @empty
          @endforelse
        </tbody>
      </table>
      @if (isset($dataFilter))
        {!! $historys->appends($dataFilter)->links() !!}
      @else
        {!! $historys->links() !!}
      @endif
  	</div>
  </div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script> console.log('Hi!'); </script>
@stop