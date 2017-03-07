@extends('layout')

@section('stats')

@foreach($all_flavors as $flavor)
	

{{$flavor->flavor}}  {{$flavor->likes}}

@endforeach


@stop