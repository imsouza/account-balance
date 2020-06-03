{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'New Deposit')

@section('content_header')
    <h1>Make Deposit</h1>
@stop

@section('content')
  <div class="card">
  	<div class="card-header">
  		
  	</div>
  	<div class="card-body">
      @if ($errors->any())
        <div class="text-light alert alert-warning">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
  		<form method="POST" action="{{ route('deposit.store') }}">
  			@csrf
  			<div class="form-group">
  				<input type="text" name="value" class="form-control" placeholder="Deposit Amount">
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-success"><i class="fas fa-arrow-circle-up"></i>&nbsp;Deposit</button>
  			</div>
  		</form>
  	</div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop