{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Withdraw')

@section('content_header')
    <h1 class="lead">Make Withdraw</h1>
@stop

@section('content')
  <div class="card">
  	<div>
  		@include('admin.includes.alerts')
  	</div>
  	<div class="card-body">
  		<form method="POST" action="{{ route('withdraw.store') }}">
  			@csrf
  			<div class="form-group">
  				<input type="text" name="value" class="form-control" placeholder="Amount to withdraw" required>
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-success"><i class="fas fa-arrow-circle-down"></i>&nbsp;Withdraw</button>
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