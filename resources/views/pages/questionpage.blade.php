@extends('layouts.master')
@section('title')
Forum Portal
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2 signup-page">
	<h2>Post a Question</h2>
	<form action="{{ route('ask_question') }}" method="post" >
		{{ csrf_field() }}
		<div class="form-group">
			<lable>Title</lable>
			<input type="text" name="title" id="title" class="form-control" value="{{ old('title')}}">
			@if($errors->has('title'))
				<span class="error">{{ $errors->first('title') }}</span>
			@endif
		</div>
		<div class="form-group">
			<lable>Category</lable>
			<select name="category" id="category" class="form-control">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->category_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<lable>Description</lable>
			<textarea name="description" id="description" class="form-control ckeditor">
				{{ old('description')}}
			</textarea>
		</div>
			@if($errors->has('description'))
				<span class="error">{{ $errors->first('description') }}</span>
			@endif
		<div class="form-group clearfix">
			<input type="submit" value="Submit Your Question" class="btn btn-primary pull-right">
		</div>
	</form>
</div>
@endsection
@section('scripts')
<script src="{{ URL::to('js/ckeditor/ckeditor.js') }}"></script>
@endsection