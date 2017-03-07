<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\flavors;

class flavorController extends Controller
{
   

    public function vote(Request $request){

    	$value = $request->flavor;

    	$flavor = flavors::where('flavor', $value)->first();

    	$flavor->likes = $flavor->likes+1;

    	$flavor->save();

    	$all_flavors = flavors::all();

    	return view('stats', array("all_flavors" => $all_flavors));

    }
}
