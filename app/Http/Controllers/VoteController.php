<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AskQuestion;

class VoteController extends Controller
{
    public function post_up_vote(){
    	$post_id = $_POST['post_id'];
    	$vote = $_POST['up_vote'];
    	$all_data = AskQuestion::find($post_id);
    	$curr_vote = $all_data->vote+$vote;
    	$all_data->vote = $curr_vote;
    	$all_data->update();
    	return $all_data->vote;
    }

    public function post_down_vote(){
    	$post_id = $_POST['post_id'];
    	$vote = $_POST['down_vote'];
    	$all_data = AskQuestion::find($post_id);
    	$curr_vote = $all_data->vote - $vote;
    	$curr_vote;
    	$all_data->vote = $curr_vote;
    	$all_data->update();
    	return $all_data->vote;
    }
}
