<?php namespace App\Models;

class Image extends \Eloquent {

	protected $table = 'images';
	protected $fillable = array('label', 'type', 'url', 'description');

	public static $rules = array(
		//'label' => 'required|min:2',
		'file' => 'image|mimes:jpg,jpeg,gif,png|max:3000|required'
	);

	public static function validate($data) {
		return \Validator::make($data, static::$rules);
	}
}