@extends('layout')

@section('edit_poll')

    <form action="/save_edited_poll" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Poll Title:
        <input type="text" name="title" value="{{ $poll->title }}"></br></br>

        <input type="hidden" name="id" value=" {{ $poll->id }}">

        @foreach($poll->options as $option)

            Option:

            <input type="text" name="options[]" value="{{ $option->option }}"></br></br>

            <input type="hidden" name="option_ids[]" value="{{ $option->id }}">

        @endforeach


        Submit:
        <input type="submit" value="Submit">

    </form>


@stop