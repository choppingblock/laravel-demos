@extends('layouts.default')

@section('header')
	<h1>{{ $student->getFullName() }}</h1>
@endsection

@section('content')
	<ul>
		<li>email: {{ $student->email }}</li>
		<li>twitter: {{ $student->twitter }}</li>
		<li>site: {{ $student->site_url }}</li>
		<li>blog: {{ $student->blog_url }}</li>
		<li>birthday: {{ $student->birthday }}</li>
		<li>year: <?php
					// error check if year was not set
					if ($student->year_id > 0) {
						echo $year = Year::find($student->year_id)->label;
					}
				?></li>
	</ul>

	<p><small>{{ $student->updated_at }}</small></p>

	<nav class="formnav">
		{{ HTML::linkRoute('students', 'Students', null, array('class' => 'pure-button')) }}
		{{ HTML::linkRoute('edit_student', 'Edit', array($student->id), array('class' => 'pure-button')) }}
		{{ Form::open(array('url' => 'student/delete', 'method' => 'delete', 'style'=>'display: inline;')) }}
		{{ Form::hidden('id', $student->id) }}
		{{ Form::submit('Delete', array('class' => 'pure-button pure-button-primary')) }}
		{{ Form::close() }}
	</nav>


@endsection