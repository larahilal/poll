@extends('layout')

@section('stats')

@foreach($options as $option)
	

{{$option->option}}  {{$option->likes}}

@endforeach


@stop