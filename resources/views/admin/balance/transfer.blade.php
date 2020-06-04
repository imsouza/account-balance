{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Transfer')

@section('content_header')
    <h1 class="lead">Make Transfer</h1>
@stop

@section('content')
  <div class="card">
  	<div>
  		@include('admin.includes.alerts')
  	</div>
  	<div class="card-body">
  		<form method="POST" action="{{ route('confirm.transfer') }}">
  			@csrf
  			<div class="form-group">
  				<input type="email" name="sender" class="form-control" placeholder="Enter the email of who will receive the transfer." required>
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-info"><i class="fas fa-arrow-circle-right"></i>&nbsp;Next Step</button>
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