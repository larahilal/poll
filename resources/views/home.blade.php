@extends('layout')


@section('home')

    @if (Auth::check('laravel_session'))


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <br><br><br>

        Welcome {{ Auth::user()->first_name }}

        <br><br>

        Create a poll<a href="{{ route('createPollForm') }}">here</a> <br>

        View my polls<a href="{{ route('viewMyPolls') }}">here</a> <br>

        Log out<a href="{{ route('logout') }}">here</a> <br><br>


        These are the polls you can vote on: <br>
        @foreach($polls as $poll)

            <a href="{{ route('displayPoll', array('poll_id' => $poll->id)) }}">{{ $poll->title }}</a>  <br>

        @endforeach

    @else

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <br><br>

        Click <a href="{{ route('registerForm') }}">here</a> to register<br><br>

        Already registered? <a href="{{ route('loginForm') }}">Login Here</a>

    @endif




@stop