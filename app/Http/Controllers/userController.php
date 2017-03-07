<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    
	public function register(){

		return view('register_form');

	}



	public function save_user(Request $request){

		$user = new users;

    	$user->first_name = $request->first_name;

    	$user->last_name = $request->last_name;

    	$user->email = $request->email;

    	$user->password = Hash::make($request->password);

    	$user->save();

    	return view('loggedin_welcome');

	}

	public function login_form(){

		return view('login_form');

	}

    public function login(Request $request){

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            return view('loggedin_welcome');

        }

        die('did not work');


    }

}
