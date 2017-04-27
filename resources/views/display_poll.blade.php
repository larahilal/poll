@extends('layout')

@section('question')

    {{ $poll->title }}



@stop


@section('loggedin_welcome')


    <form action="/vote" method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @foreach ($poll->options as $option)

            {{ $option->option }}

            <input type="radio" name="option_id" value="{{ $option->id }}">

        @endforeach


        Submit:
        <input type="submit" value="Submit">

    </form>

@stop