<?php

class SkillsController extends BaseController {

	public $restful = true;

	public function getIndex() {
		return View::make('skills.index')
			->with('title', 'Skills')
			->with('skills', Skill::orderBy('label')->get());
	}

}