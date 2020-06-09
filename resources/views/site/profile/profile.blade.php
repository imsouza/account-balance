@extends('site.layouts.template')

@section('title', 'My Profile')

@section('content')
<div class="card">
	<div class="card-header">
		<h3>Update Profile</h3>
		@include('admin.includes.alerts')
	</div>
	<div class="card-body">
		<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ auth()->user()->name }}" name="name" placeholder="Name" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" value="{{ auth()->user()->email }}" name="email" placeholder="E-mail" class="form-control" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off">
			</div>
			<div class="form-group">
				@if (auth()->user()->image != null)
					<img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->name }}" width="50">
				@endif
				<label for="image">Image</label>
				<input type="file" class="form-control" name="image">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info form-control">Update</button>
			</div>
		</form>
	</div>
</div>
@endsection