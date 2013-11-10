<?php

class Images extends Eloquent {

	protected $guarded = array('id', 'imageID');
	protected $table = 'images';
	protected $primaryKey = 'imageID';


	public function images() {
 		return $this->belongsToMany('Phone', 'phones_has_images', 'phones_has_imagesID', 'imageID', 'phoneID');
 	}

}