@extends('layout')

@section('create_poll')

    <form action="insert_poll" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Poll Title:
        <input type="text" name="title"></br></br>

        Option 1:

        <input type="text" name="option1"></br></br>

        Option 2:

        <input type="text" name="option2"></br></br>

        Poll Image:

        <input type="file" name="image"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>





@stop