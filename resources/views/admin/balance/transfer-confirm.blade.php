{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Confirm Transfer')

@section('content_header')
    <h1 class="lead">Confirm Balance Transfer</h1>
@stop

@section('content')
  <div class="card">
  	<div>
  		@include('admin.includes.alerts')
  	</div>
  	<div class="card-body">
      <div>
        <strong class="text-secondary">Receiver: </strong><span class="text-info">{{ $sender->name }}</span><br>
        <strong class="text-secondary">Current Balance: </strong><span class="text-success">$ {{ number_format($balance->amount, 2, '.', '') }}</span><br><br>
      </div>
  		<form method="POST" action="{{ route('transfer.store') }}">
  			@csrf
        <input type="hidden" name="sender_id" value="{{ $sender->id }}">
  			<div class="form-group">
  				<input type="text" name="value" class="form-control" placeholder="Amount to transfer" required>
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i>&nbsp;Transfer</button>
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