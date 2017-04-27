@extends('layout')

@section('welcome')

    Welcome!<br>

    Create a poll <a href="{{ route('createPollForm') }}">here</a> <br><br>

    View my polls <a href="{{ route('ViewMyPolls') }}">here</a> <br><br>

    Log out <a href="{{ route('LogOut') }}">here</a>



@stop

