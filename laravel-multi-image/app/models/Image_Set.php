<?php

class Image_Set extends Eloquent {
	
	protected $table = 'image_set';

    public function image()
    {
        return $this->hasOne('Set');
    }
     
    public function set()
    {
        return $this->hasOne('Image');
    }
}