@extends('layout')

@section('my_poll')


    @foreach($my_polls as $poll)

        {{ $poll->title }}
        <a href="{{ route('editMyPoll', array('poll_id' => $poll->id)) }}">edit</a>
        <a href="{{ route('deleteMyPoll', array('poll_id' => $poll->id)) }}">delete</a><br>

    @endforeach

    <br><br>

    <a href="{{ route('home') }}">Go home</a>


@stop