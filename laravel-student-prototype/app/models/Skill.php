<?php

class Skill extends Eloquent {

	protected $table = 'skills';
	protected $fillable = array('label');
	
	public function students() {
        return $this->belongsToMany('Student');
    }

	public static $rules = array(
		'label' => 'required|min:2'
	);
	
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}