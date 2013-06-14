@extends('layouts.default')

@section('header')
	<h1>Students Home Page</h1>
@endsection

@section('content')
	<table class="pure-table">
		<thead>
	        <tr>
	            <th>Name</th>
	            <th>Email</th>
	            <th>Year</th>
	            <th>Skills</th>
	        </tr>
    	</thead>
		<tbody>

			<?php 

				// array-reduce
				// http://www.php.net/manual/en/function.array-reduce.php
				function skill_labels($s, $n){
						return($s . ", " . $n["label"]);
				}

			 ?>
			@foreach($students as $student)

				<tr>
				<td>{{ HTML::linkRoute('student', $student->getFullName(), array($student->id)) }}</td>
				<td>{{ $student->email }}</td>
				<td><?php
					// error check if year was not set
					if ($student->year_id > 0) {
						echo $year = Year::find($student->year_id)->label;
					}
				?></td>
				<td>
					<?php
					
					$skills = Student::find($student->id)->skills->toArray();

					//var_dump(count($skills));

					// // pull off the 1st one
					$initial = array_shift($skills);

					// // echo the function above
					echo array_reduce($skills, "skill_labels", $initial["label"]);

					?></td>
				</tr>

			@endforeach
		</tbody>
	</table>

	<nav class="formnav">
		{{ HTML::linkRoute('new_student', 'New Student', null, array('class' => 'pure-button')) }}
	</nav>
@stop