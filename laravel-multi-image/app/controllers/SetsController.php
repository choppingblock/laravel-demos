<?php

class SetsController extends BaseController {

	public $restful = true;

	public function getIndex() {
		return View::make('sets.index')
			->with('title', 'Sets')
			->with('sets', Set::orderBy('created_at')->get());
	}


}