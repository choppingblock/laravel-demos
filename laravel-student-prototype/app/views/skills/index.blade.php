@extends('layouts.default')

@section('header')
	<h1>Skills Home Page</h1>
@endsection

@section('content')
	<ul>
		@foreach($skills as $skill)

		<li>{{ HTML::linkRoute('skill', $skill->label, array($skill->id)) }}</li> 

		@endforeach
	</ul>

	<span>{{ HTML::linkRoute('new_skill', 'New Skill') }}</span>
@stop