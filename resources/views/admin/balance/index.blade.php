{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Balance')

@section('content_header')
  <h1>Balance</h1>
@stop

@section('content')
  <div class="card">
  	<div class="card-header">
  		<a href="{{ route('balance.deposit') }}" class="btn btn-primary text-white"><i class="fas fa-cart-plus"></i>&nbsp;Deposit</a>
  		<a class="btn btn-danger text-white"><i class="fas fa-cart-arrow-down"></i>&nbsp;Withdraw</a>
  	</div>
  	<div class="card-body">
				<div class="small-box bg-green">
            <div class="inner">
              <h3 class="mt-3 pb-3">$ {{ number_format($amount, 2, '.', '')}}</h3>
            </div>
            <div class="icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            <a href="#" class="small-box-footer">History <i class="fa fa-arrow-circle-right"></i></a>
        </div>
  	</div>
  </div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script> console.log('Hi!'); </script>
@stop