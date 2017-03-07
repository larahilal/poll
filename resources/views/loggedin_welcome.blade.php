@extends('layout')

@section('question')

What flavor do you like the  most?

@stop


@section('loggedin_welcome')


<form action="/" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    Vanilla:
    <input type="radio" name="flavor" value="vanilla">

    Coconut:
    <input type="radio" name="flavor" value="coconut">

    Caramel:
    <input type="radio" name="flavor" value="caramel"></br></br>

    Submit:
    <input type="submit" value="Submit">

</form>



@stop