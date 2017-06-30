<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AskQuestion;
use App\User;
use App\Answer;
use Auth;

class PageController extends Controller
{
    public function home(){
    	$posts = AskQuestion::orderBy('created_at', 'desc')->get();
        return view('pages.index', compact('posts'));
    }

    public function getSignup(){
        return view('user.signup');
    }

    public function singlepage($cat, $slug){
    	$single_post = AskQuestion::where('slug', $slug)->first();
    	return view('pages.single', compact('single_post'));
    }
    
    public function getAnswer(){
        return back();
    }
    public function postAnswer(Request $request, $id){
        $this->validate($request, [
            'answer'   => 'required'
        ]);

        $answer = new Answer([
            'user_id'       => auth()->user()->id,
            'ask_question_id'   => $id,
            'answer'        => $request->input('answer')
        ]);
        $answer->save();
        return back();
    }
}
