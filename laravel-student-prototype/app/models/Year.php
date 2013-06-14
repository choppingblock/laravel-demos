<?php

class Year extends Eloquent {

	protected $table = 'years';
	protected $fillable = array('label');
	
	public function student()
    {
        return $this->belongsTo('Student');
    }

	public static $rules = array(
		'label' => 'required|min:4'
	);
	
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}