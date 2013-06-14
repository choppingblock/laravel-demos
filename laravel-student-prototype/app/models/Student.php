<?php

class Student extends Eloquent {

	protected $table = 'students';
	protected $fillable = array('first_name', 'last_name', 'email', 'twitter', 'site_url', 'blog_url', 'birthday', 'year_id');
	
	public function getFullName() {
		return $this->first_name . ' ' . $this->last_name;
	}

	public function year()
    {
        return $this->hasOne('Year');
    }

    public function skills()
    {
        return $this->belongsToMany('Skill');
    }

	public static $rules = array(
		'first_name' => 'required|min:2',
		'last_name' => 'required|min:2'
	);
	
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}