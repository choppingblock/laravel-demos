<?php

class YearsController extends BaseController {

	public $restful = true;

	public function getIndex() {
		return View::make('years.index')
			->with('title', 'Years')
			->with('years', Year::orderBy('label')->get());
	}

}