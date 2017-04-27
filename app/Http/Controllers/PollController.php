<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\option;

use App\poll;

use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{

	public function home(){

		$polls = poll::all();

		return view('home', array('polls'=> $polls));

	}

	public function displayPoll($poll_id)
	{
		$poll = poll::where('id', $poll_id)->first();

		return view('display_poll', array('poll'=>$poll));
	}

    public function vote(Request $request){

		$option_id = $request->option_id;

    	$option = option::where('id', $option_id)->first();

    	$option->likes = $option->likes+1;

    	$option->save();

		$poll_id = $option->poll_id;

		return redirect()->route('results', array('poll_id' => $poll_id));
    }

	public function viewResults($poll_id)
	{
		$options = option::where('poll_id', $poll_id)->get();

		return view('stats', array("options" => $options));
	}

	public function create_poll_form(){

		return view('create_poll');

	}

	public function insert_poll(Request $request){

		$poll = new poll;
		$poll->title = $request->title;
		$poll->user_id = Auth::user()->id;
		$poll->save();

		$option1 = new option;
		$option1->option = $request->option1;
		$option1->poll_id = $poll->id;
		$option1->save();

		$option2 = new option;
		$option2->option = $request->option2;
		$option2->poll_id = $poll->id;
		$option2->save();

		return redirect()->route('viewMyPolls');

	}

	public function view_my_polls(){

		$user_id = Auth::user()->id;

		$my_polls = poll::where('user_id', $user_id)->get();

		return view('my_polls', array("my_polls" => $my_polls));

	}

	public function edit_my_poll($poll_id){

		$poll = poll::where('id', $poll_id)->first();

		return view('edit_poll', array("poll" => $poll));

	}

	public function save_edited_poll(Request $request){

		$poll = poll::where('id', $request->id)->first();

		$poll->title = $request->title;

		$poll->save();

		$count = 0;

		$option_titles = $request->options;

		$option_ids = $request->option_ids;

		foreach($option_ids as $option_id){

			$option = option::where('id', $option_id)->first();

			$option->option = $option_titles[$count];

			$option->save();

			$count++;

		}

		return redirect()->route('viewMyPolls');

	}

	public function delete_my_poll($poll_id){

		$poll = poll::where('id', $poll_id)->first();

		$poll->delete();

		return redirect()->route('home');

	}

}
