@extends('layout')

@section('register')

<form action="register" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

   	First Name:
    <input type="text" name="first_name"></br></br>

    Last Name:
    <input type="text" name="last_name"></br></br>

    Email:
    <input type="text" name="email"></br></br>

    Password:

    <input type="text" name="password"></br></br>

    Submit:
    <input type="submit" value="Submit">

</form>




@stop