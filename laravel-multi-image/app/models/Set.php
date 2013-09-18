<?php

class Set extends Eloquent {

	protected $table = 'sets';
	protected $fillable = array('label', 'date', 'description');

	public static $rules = array(
		'label' => 'required|min:2'
	);

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}