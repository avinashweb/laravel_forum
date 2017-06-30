@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ URL::to('css/reg.css') }}">
@endsection
@section('title')
User Signin Page
@endsection

@section('content')
<div class="col-md-6 col-md-offset-3 signup-page">
	<h1>Signin</h1>
	<form action="{{ route('signin') }}" method="post" >
		{{ csrf_field() }}
		<div class="form-group">
			<lable>Email</lable>
			<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
			@if($errors->has('email'))
				<span class="error">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="form-group">
			<lable>Password</lable>
			<input type="password" name="password" id="password" class="form-control">
			@if($errors->has('password'))
				<span class="error">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="form-group clearfix">
			<input type="submit" value="Sign in" class="btn btn-primary pull-right">
		</div>
	</form>
</div>
@endsection