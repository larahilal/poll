<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;

//use App\option;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    
	public function register(){

		return view('register_form');

	}

	public function save_user(Request $request){

		$this->validate($request,[

            'first_name' => 'bail|required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',

        ]);

        $user = new users;

    	$user->first_name = $request->first_name;

    	$user->last_name = $request->last_name;

    	$user->email = $request->email;

    	$user->password = Hash::make($request->password);

    	$user->save();

        return redirect()->route('home')->with('status', 'You have been registered! Please log in');
	}

	public function login_form(){

        if (Auth::check('laravel_session')) {

            return redirect()->route('home');

        } else {

		    return view('login_form');

        }

	}

    public function login(Request $request){

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            return redirect()->route('home');

        } else {

            return redirect()->route('loginForm');

        }
    }

    public function logout(){

        Auth::logout();

        return redirect()->route('home');

    }

}
