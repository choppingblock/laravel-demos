<?php

class Image extends Eloquent {

	protected $table = 'images';
	protected $fillable = array('title', 'url', 'description');

	public static $rules = array(
		'title' => 'required|min:2',
		'url' => 'image|mimes:jpg,jpeg,gif,png|max:3000|required'
	);

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}