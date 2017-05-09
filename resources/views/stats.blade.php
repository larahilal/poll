@extends('layout')

@section('stats')

    @foreach($options as $option)

        {{$option->option}}  {{$option->likes}}

    @endforeach

    <br><br>

    <a href="{{ route('home') }}">Go home</a>


@stop