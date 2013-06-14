@extends('layouts.default')

@section('header')
	<h1>Years Home Page</h1>
@endsection

@section('content')
	<ul>
		@foreach($years as $year)

		<li>{{ HTML::linkRoute('year', $year->label, array($year->id)) }}</li> 

		@endforeach
	</ul>

	<span>{{ HTML::linkRoute('new_year', 'New Year') }}</span>
@stop