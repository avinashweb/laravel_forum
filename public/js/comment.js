function comment_function(e){
	$('.comment-'+e).slideToggle('slow');
	$('.comment-btn-'+e).text(function(i, text){
          return text === "Comment" ? "Hide" : "Comment";
     });
}

/*Sign in form validation*/
$(function(){
	$('.email_error').hide();
	$('.pass_error').hide();
	var email_error = false;
	var pass_error = false;

	function email_validation(){
		var email_txt = $("#email").val();
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(email_txt.length < 1){
			$('.email_error').show();
			email_error = true;
			$('.email_error').html('Please enter your Email ID.');
		}
		else if(!regex.test(email_txt)){
			$('.email_error').show();
			email_error = true;
			$('.email_error').html('Please enter valid Email ID.');
		}
		else{
			$('.email_error').hide();
			email_error = false;
		}
	}
	function pass_validation(){
		var password_txt = $("#password").val();
		if(password_txt.length < 1){
			$('.pass_error').show();
			pass_error = true;
			$('.pass_error').html('Please enter Password');
		}
		else{
			$('.pass_error').hide();
			pass_error = false;
		}
	}

	$("#email").focusout(function(){
		email_validation();
	});
	$("#password").focusout(function(){
		pass_validation();
	});
	$("#login-form").submit(function(){
		email_error = false;
		pass_error = false;
		email_validation();
		pass_validation();
		if(email_error==false && pass_error==false){
			return true;
		}
		else{
			return false;
		}
	});
});

/* Up Vote Question using AJAX */
function up_vote(e){
	$.ajax({
		method: 'post',
		url: url,
		data: {up_vote: e, post_id: post_id, _token: token },
		success: function(data){
			$('.vote-counter').text(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        $('#myModal').modal('show');
	    }
	});
}

/* Down Vote Qusetion using AJAX */
function down_vote(e){
	$.ajax({
		method: 'post',
		url : down_url,
		data: {down_vote: e, post_id: post_id, _token: token},
		success: function(data){
			$('.vote-counter').text(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        $('#myModal').modal('show');
	    }
	});
}
