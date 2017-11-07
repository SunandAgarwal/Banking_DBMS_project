<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct() {
		$this->middleware('guest', ['except' => 'destroy']);
	}
	//for homepage
	public function homepage() {
		return view('homepage');
	}
    // for login, creating a session
    public function create() {
    	return view('login');
    }

    // for login, logging in the user
    public function store() {
    	//form validation
    	$this->validate(request(), [
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	if(!auth()->attempt(request(['email', 'password'])))
    		return back()->withErrors([
    			'message' => 'Invalid Credentials!'
    		]);
    	return redirect()->home();
    }

    public function destroy() {
    	auth()->logout();
    	return redirect('/');
    }

}
