@extends('layouts.default')

@section('header')
	<h1>{{ $student->getFullName() }}</h1>
@endsection

<?php 

	// array-reduce
	// http://www.php.net/manual/en/function.array-reduce.php
	function skill_labels($s, $n){
			return($s . ", " . $n["label"]);
	}

 ?>

@section('content')
	<ul>
		<li>email: {{ $student->email }}</li>
		<li>twitter: {{ $student->twitter }}</li>
		<li>site: {{ $student->site_url }}</li>
		<li>blog: {{ $student->blog_url }}</li>
<!-- 		<li>birthday: {{ $student->birthday }}</li>
 -->	
 		<li><?php
 			$birthday = $student->birthday;

 			echo "birthday: <script> document.write(moment('".$birthday."', 'YYYY-MM-DD').format('dddd, MMMM Do YYYY')); </script>";
 		 ?></li>
 		<li>year: <?php
					// error check if year was not set
					if ($student->year_id > 0) {
						echo $year = Year::find($student->year_id)->label;
					}
				?></li>
		<li>
			<?php
				
				$skills = Student::find($student->id)->skills->toArray();

				// // pull off the 1st one
				$initial = array_shift($skills);

				// // echo the function above
				echo "skills: " . array_reduce($skills, "skill_labels", $initial["label"]);

			?>
		</li>
	</ul>

<!-- 	<p><small>{{ $student->updated_at }}</small></p>
 -->	<p><small><?php echo "last edit: <script> document.write(moment('".$student->updated_at."').calendar()); </script>"; ?></small></p>

	<nav class="formnav">
		{{ HTML::linkRoute('students', 'Students', null, array('class' => 'pure-button')) }}
		{{ HTML::linkRoute('edit_student', 'Edit', array($student->id), array('class' => 'pure-button')) }}
		{{ Form::open(array('url' => 'student/delete', 'method' => 'delete', 'style'=>'display: inline;')) }}
		{{ Form::hidden('id', $student->id) }}
		{{ Form::submit('Delete', array('class' => 'pure-button pure-button-primary')) }}
		{{ Form::close() }}
	</nav>


@endsection