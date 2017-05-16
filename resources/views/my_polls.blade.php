@extends('layout')

@section('my_poll')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br><br>

    @foreach($my_polls as $poll)

        {{ $poll->title }}
        <a href="{{ route('editMyPoll', array('poll_id' => $poll->id)) }}">edit</a>
        <a href="{{ route('deleteMyPoll', array('poll_id' => $poll->id)) }}">delete</a><br>

    @endforeach

    <br><br>

    <a href="{{ route('home') }}">Go home</a>


@stop