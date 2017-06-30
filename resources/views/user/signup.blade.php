@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ URL::to('css/reg.css') }}">
@endsection
@section('title')
User Signup Page
@endsection

@section('content')
<div class="col-md-6 col-md-offset-3 signup-page">
	<h1>Signup</h1>
	<form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
			@if($errors->has('name'))
				<span class="error">{{ $errors->first('name') }}</span>
			@endif
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
			@if($errors->has('email'))
				<span class="error">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" id="password" class="form-control">
			@if($errors->has('password'))
				<span class="error">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="form-group">
			<label>Re-type Password</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
		</div>
		<div class="form-group">
			<label for="file-upload">Uplaod Image</label>
			<input type="file" name="user_image" id="user_image" value="user_image.jpg" >
		</div>
		<div class="form-group clearfix">
			<input type="submit" value="Sign up" class="btn btn-primary pull-right">
			@if($errors->has('user_image'))
				<span class="error">{{ $errors->first('user_image') }}</span>
			@endif
		</div>
	</form>
</div>
@endsection