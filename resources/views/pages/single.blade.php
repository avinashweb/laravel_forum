@extends('layouts.master')
@section('title')
Forum Portal
@endsection
@section('content')
<div class="col-md 12 content-sty">
	<div class="vote-cont">
		<span class="glyphicon glyphicon-triangle-top up-vote" onclick="up_vote(1)"></span>
		<span class="vote-counter text-center">{{ $single_post->vote }}</span>
		<span class="glyphicon glyphicon-triangle-bottom down-vote" onclick="down_vote(1)"></span>
	</div>
	<div class="question-content">
		<div class="auth-div">
			<div class="user_img">
				<img src="{{ asset( $single_post->user->user_image )}}" alt="">
			</div>
			<div class="content-title">
				<h1 class="main-title">{{ $single_post->title }}</h1>
				<p>Asked by:- {{ $single_post->user->name }}, {{ $single_post->created_at->diffForHumans()}}</p>
			</div>
		</div>

		<div class="content">
			<?php echo $single_post->description; ?>
		</div>
	</div>
	<div class="answer">
		<h3>Answers</h3><hr>
		<ul class="item-group answer-list">
		@if(count($single_post->answer) > 0)
			@foreach($single_post->answer as $answer)
				<li class="list-group-item clearfix"><span class="user_img"><img src="{{ asset( $answer->user->user_image )}}" alt=""></span><?php echo $answer->answer; ?><span class="btn btn-xs btn-primary pull-right comment-btn-{{$answer->id}}" onclick="comment_function({{$answer->id}})" >Comment</span><span class="answered">Posted by:- {{$answer->user->name}}, {{$answer->created_at->diffForHumans()}}</span></li>
				<div id="comment-box" class="comment-{{$answer->id}}">
				@if(Auth::check())
				<form action="http://localhost/lara_forum/public/comment/{{$single_post->id}}/{{$answer->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="comment_{{$answer->id}}" id="comment" class="form-control"></textarea>
						@if($errors->has('comment_'.$answer->id))
							<span class="error">{{ $errors->first('comment_'.$answer->id) }}</span>
						@endif
					</div>
					<div class="form-group clearfix">
						<input type="submit" value="Submit Comment" class="btn btn-primary btn-xs pull-right">
					</div>
				</form>
				@endif
				<hr>
				<h4>All Comments</h4>
				<ul class="list-group">
				@foreach($answer->comment as $comment)
					<li class="list-group-item clearfix"><span class="user_img"><img src="{{ asset( $comment->user->user_image )}}" alt=""></span><p>{{$comment->comment}}</p><span class="answered">Posted by:- {{$comment->user->name}}, {{$comment->created_at->diffForHumans()}}</span></li>
				@endforeach
				</ul>
				<hr>
				</div>
			@endforeach
		@else
				<li class="list-group-item">No Answer Found.</li>
		@endif
		</ul>
		<hr>
	</div>
	@if(Auth::check())
	<div class="answer-div">
		<form action="http://localhost/lara_forum/public/post-answer/{{ $single_post->id }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<textarea name="answer" id="answer" class="form-control ckeditor"></textarea>
				@if($errors->has('answer'))
					<span class="error">{{ $errors->first('answer') }}</span>
				@endif
			</div>
			<div class="form-group clearfix">
				<input type="submit" value="Post Answer" class="btn btn-primary pull-right">
			</div>	
		</form>
	</div>
	@endif
</div>
<!-- Model Section -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign in</h4>
        </div>
        <div class="modal-body">
          	<form action="{{ route('ajax-login') }}" method="post" id="login-form">
				{{ csrf_field() }}
				<div class="form-group">
					<lable>Email</lable>
					<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
					<span class="error email_error">fdfs</span>
					@if($errors->has('email'))
						<span class="error">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group">
					<lable>Password</lable>
					<input type="password" name="password" id="password" class="form-control">
					<span class="error pass_error">dsfsd</span>
					@if($errors->has('password'))
						<span class="error">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="form-group clearfix">
					<input type="submit" value="Sign in" class="btn btn-primary pull-right">
				</div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" id="popup-btn" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
@endsection

@section('scripts')
<script>
	var url = '{{route("up_vote")}}';
	var token = '{{Session::token()}}';
	var post_id = '{{ $single_post->id }}';
	var down_url = '{{ route("down_vote") }}';
</script>
<script src="{{ URL::to('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::to('js/comment.js')}}"></script>
@endsection