<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\option;

use App\poll;

class PollController extends Controller
{
	public function displayPoll($poll_id)
	{
		$poll = poll::where('id', $poll_id)->first();

		return view('display_poll', array('poll'=>$poll));
	}

    public function vote(Request $request){

    	$value = $request->option;

    	$option = option::where('option', $value)->first();

    	$option->likes = $option->likes+1;

    	$option->save();

		return redirect()->route('results');
    }

	public function viewResults()
	{
		$options = option::all();

		return view('stats', array("options" => $options));
	}

	public function home(){

		$polls = poll::all();

		return view('welcome', array('polls'=>$polls));

	}
}
