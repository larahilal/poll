@extends('layout')

@section('question')

    @foreach($polls as $poll)

        <a href="http://127.0.0.1:8000/poll/{{$poll->id}}">{{ $poll->title }}</a>

    @endforeach

@stop


@section('welcome')





Click <a href="{{ route('registerForm') }}">here</a> here to register and win!! </br></br>

Already registered? <a href="{{ route('loginForm') }}">Login Here</a>


@stop