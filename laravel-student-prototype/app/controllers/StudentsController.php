<?php

class StudentsController extends BaseController {

	public $restful = true;

	public function getIndex() {
		return View::make('students.index')
			->with('title', 'Students')
			->with('students', Student::orderBy('last_name')->get());
	}

	public function getView($id) {
		return View::make('students.view')
			->with('title', 'Student View Page')
			->with('student', Student::find($id));
	}

	public function getNew() {
		return View::make('students.new')
			->with('title', 'Add New Student')
			->with('skills', Skill::orderBy('label')->get());
	}

	public function postCreate() {
		$validation = Student::validate(Input::all());
		
		if ($validation->fails()) {
			return Redirect::route('new_student')->withErrors($validation)->withInput();
		} else {
		
		$student = Student::create( array(
			'first_name'=>Input::get('first_name'),
			'last_name'=>Input::get('last_name'),
			'email'=>Input::get('email'),
			'twitter'=>Input::get('twitter'),
			'site_url'=>Input::get('site_url'),
			'blog_url'=>Input::get('blog_url'),
			'birthday'=>Input::get('birthday'),
			'year_id'=>Input::get('year_id')
		));

		//var_dump($student);

		// $s = array(
		// 	'student_id' => $student->id,
		// 	'skill_id' => 1
		// );

		// $skill = Skill::find(1);

		// var_dump($skill);

		//$student->skills()->insert($skill);

		$skills = DB::table('skills')->get();
		foreach ($skills as $skill) {
			var_dump(Input::get($skill->label));
			if( $skill->label = Input::get($skill->label) ) {
				$student->skills()->attach($skill->id);

			}
		}

		//$student->skills()->attach(1);

		// Not sure about this
		Skill_Student::create(
			array()
		);

		return Redirect::route('students')
			->with('message', 'Student was created successfully!');
		}
	}

	public function getEdit($id) {
		return View::make('students.edit')
			->with('title', 'Edit Student')
			->with('student', Student::find($id))
			->with('skills', Skill::orderBy('label')->get());
	}

	public function putUpdate() {
		$id = Input::get('id');
		$validation = Student::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::route('edit_student', $id)->with_errors($validation);
		} else {
			$student = Student::find($id);

			$student->first_name = Input::get('first_name');
			$student->last_name = Input::get('last_name');
			$student->email = Input::get('email');
			$student->twitter = Input::get('twitter');
			$student->site_url = Input::get('site_url');
			$student->blog_url = Input::get('blog_url');
			$student->birthday = Input::get('birthday');
			$student->year_id = Input::get('year_id');

			$student->save();

			return Redirect::route('student', $id)
				->with('message', 'Student updated successfully!');
		}
	}

	public function deleteDestroy() {
		Student::find(Input::get('id'))->delete();
		return Redirect::route('students')
			->with('message', 'The Student was deleted successfully!');
	}

}