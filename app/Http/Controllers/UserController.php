<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getSignup(){
    	return view('user.signup');
    }
    public function postSignup(Request $request){
    	$this->validate(request(), [
    		'name'	       => 'required',
    		'email'	       => 'required|email|unique:users',
    		'password'	   => 'required|min:6|confirmed',
            'user_image'   => 'max:2048 |mimes:jpeg,png,gif'
    	]);
        $path="avatars/user_image.jpg";
        if(request()->file('user_image'))
        {
            $file = request()->file('user_image');
            $path = $file->store('avatars');
        }
    	$user = new User([
    		'name'		   => $request->input('name'),
    		'email'		   => $request->input('email'),
            'user_image'   => $path,
    		'password'	   => bcrypt($request->input('password'))
    	]);
    	$user->save();
        
    	auth()->login($user);
    	return redirect()->route('home');
    }

    public function getSignin(){
    	return view('user.signin');
    }
    public function postSignin(Request $request){
    	$this->validate(request(), [
    		'email'		=> 'required',
    		'password'	=> 'required'
    	]);

    	if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
    		return redirect()->route('home');
    	}
    	return back();
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('signin');
    }

    public function getAjaxLogin(){
        return back();
    }

    public function postAjaxLogin(Request $request){

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $this->validate($request, [
                'email'     => 'required|email',
                'password'  => 'required'
            ]);
            return back();
        }
        else{
                return back()->withInput()->withErrors([
                    'password' => 'Incorrect Email ID or Password, Please try again.'
                ]);
            }
        }
}
