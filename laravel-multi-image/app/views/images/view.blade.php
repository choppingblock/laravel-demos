@extends('layouts.default')

@section('header')
    <h1>Image: {{ $image->label }}</h1>
@endsection

@section('content')
	<ul>
		<li>Label: {{ $image->label }}</li>
		<li>Image: <img src='/{{ $image->url }}' width="200"></li>
		<li>Description: {{ $image->description }}</li>
	</ul>

	<nav class="formnav">
		{{ HTML::linkRoute('images', 'Images', null, array('class' => 'pure-button')) }}
	</nav>
@endsection