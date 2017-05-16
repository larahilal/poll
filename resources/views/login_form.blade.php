@extends('layout')

@section('login_form')

    <form action="login" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Email:
        <input type="text" name="email"></br></br>

        Password:

        <input type="password" name="password"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>





@stop