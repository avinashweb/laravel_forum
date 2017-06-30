<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\AskQuestion;
use Auth;
use App\User;
use App\Comment;

class ForumController extends Controller
{
    public function getQuestionPage(){
    	$categories = Category::all();
    	return view('pages.questionpage', compact('categories'));
    }
    public function postQuestionPage(Request $request){
        $user = Auth::user()->id;
        
    	$this->validate(request(), [
    		'title'			=> 'required|min:10',
    		'description'	=> 'required|min:15'
    	]);
    	$post = AskQuestion::create([
    		'category_id' 	=> request('category'),
    		'user_id'		=> $user,
    		'title' 		=> $request->input('title'),
    		'description' 	=> $request->input('description'),
    		'slug'			=> Str::slug($request->input('title'), '-'),
    	]);
    	$post->save();
    	return redirect()->route('home');
    }

    public function getComment($ques_id, $ans_id){
        return back();
    }

    public function postComment(Request $request, $ques_id, $ans_id){
        $user = Auth::user()->id;
        $this->validate($request, [
            'comment_'.$ans_id   => 'required'
        ]);
        $comment = Comment::create([
            'user_id'       => $user,
            'answer_id'     => $ans_id,
            'question_id'   => $ques_id,
            'comment'       => $request->input('comment_'.$ans_id)
        ]);
        $comment->save();
        return back();
    }
}
