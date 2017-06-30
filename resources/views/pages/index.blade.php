@extends('layouts.master')
@section('title')
Forum Portal
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		@foreach($posts as $post)
		<div class="col-md-12 single-post">
			<div class="title">
				<h2><a href="{{$post->category->category_slug}}/{{ $post->slug }}">{{ $post->title }}</a></h2>
				<p class="post-status">Asked by {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}, Total Answers: {{ $post->answer->count() }}</p>
			</div>
			<div class="cotent">
				<?php echo $post->description; ?>
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-md-4">
		Side Bar
	</div>
</div>
@endsection