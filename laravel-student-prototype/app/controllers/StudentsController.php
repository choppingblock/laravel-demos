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

		// enter the data for skills checkboxes
		// loop through skills
		$skills = DB::table('skills')->get();
		foreach ($skills as $skill) {
			// replace/escape for spaces
			$label = preg_replace("![^a-z0-9]+!i", "-", $skill->label);
			$label = 'skill_' . $label;

			if( $label = Input::get($label) ) {
				$student->skills()->attach($skill->id);
			}
		}

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

			$original = array();
			$new = array();

			// loop through skills
			$skills = DB::table('skills')->get();
			foreach ($skills as $skill) {
				//array_push($all, $skill->id);
				// replace/escape for spaces
				$label = preg_replace("![^a-z0-9]+!i", "-", $skill->label);
				$label = 'skill_' . $label;

				// populate new array
				if( $label = Input::get($label) ) {
					array_push($new, $skill->id);
				}
			}

			// populate original array
			$related_skills = Student::find($id)->skills;
			foreach ($related_skills as $related_skill) {
				array_push($original, $related_skill->pivot->skill_id);
			}

			// figure it out
			$int = array_values(array_intersect($original, $new)); //C = A ^ B
            $original = array_values(array_diff($original, $int)); //A' = A - C
            $new = array_values(array_diff($new, $int)); //B' = B - C

			// Log::info('$original is ' . implode(", ",$original) );
			// Log::info('$new is ' . implode(", ",$new) );

			// remove any items
			foreach ($original as $key) {
				// Log::info('Need to remove ' . Skill::find($key)->label );
				$item = Skill_Student::where('student_id', '=', $id)->where('skill_id', '=', $key)->delete();
			}

			// attach any items
			foreach ($new as $key) {
				// Log::info('Need to add ' . Skill::find($key)->label );
				$student->skills()->attach($key);
			}

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