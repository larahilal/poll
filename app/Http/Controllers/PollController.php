<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\option;

use App\poll;

use Illuminate\Support\Facades\Auth;

use App\vote;

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

    public function cast_vote(Request $request){

		$user = Auth::user()->id;

		$casted_votes = vote::where('user_id', $user)->get();

		foreach ($casted_votes as $casted_vote){

			if($user == $casted_vote->user_id and $request->poll_id == $casted_vote->poll_id){

				return redirect()->route('home')->with('status', 'You already voted on this poll, please select a different one');

			} else{

				$option_id = $request->option_id;

				$option = option::where('id', $option_id)->first();

				$option->likes = $option->likes+1;

				$option->save();

				$poll_id = $option->poll_id;

				$vote = new vote;

				$vote->user_id = Auth::user()->id;

				$vote->poll_id = $poll_id;

				$vote->save();

				return redirect()->route('results', array('poll_id' => $poll_id));

			}

		}
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

		$user_id = Auth::user()->id;

		$poll = new poll;
		$poll->title = $request->title;
		$poll->user_id = Auth::user()->id;

		if($user_id == $poll->user_id) {

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

		} else {

			return redirect()->route('createPollForm');
		}

	}

	public function view_my_polls(){

		$user_id = Auth::user()->id;

		$my_polls = poll::where('user_id', $user_id)->get();

		return view('my_polls', array("my_polls" => $my_polls));

	}

	public function edit_my_poll($poll_id){


		$user_id = Auth::user()->id;

		$poll = poll::where('id', $poll_id)->first();

		if(empty($poll->likes)){

			return redirect()->route('viewMyPolls')->with('status', 'You cannot edit this poll, people already voted');

		} else {

			if ($user_id == $poll->user_id) {

				return view('edit_poll', array("poll" => $poll));

			} else {

				return redirect()->route('viewMyPolls');

			}

		}

	}

	public function save_edited_poll(Request $request){

		$user_id = Auth::user()->id;

		$poll = poll::where('id', $request->id)->first();

		if($poll->user_id == $user_id) {

			$poll->title = $request->title;

			$poll->save();

			$count = 0;

			$option_titles = $request->options;

			$option_ids = $request->option_ids;

			foreach ($option_ids as $option_id) {

				$option = option::where('id', $option_id)->first();

				$option->option = $option_titles[$count];

				$option->save();

				$count++;

			}

			return redirect()->route('viewMyPolls');

		} else {

			return redirect()->route('home');

		}

	}

	public function delete_my_poll($poll_id){

		$user_id = Auth::user()->id;

		$poll = poll::where('id', $poll_id)->first();

		if($poll->user_id == $user_id) {

			$poll->delete();

			return redirect()->route('home');

		} else {

			return redirect()->route('home');

		}
	}

}
