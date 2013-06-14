<?php

class Skill_Student extends Eloquent {
	
	protected $table = 'skill_student';

    public function skill()
    {
        return $this->hasOne('Student');
    }
     
    public function student()
    {
        return $this->hasOne('Skill');
    }
}