<?php

class Phone extends Eloquent {

	protected $guarded = array('id', 'phoneID');
	//public $timestamps = false;

	protected $softDelete = true;
	protected $table = 'phones';

	protected $primaryKey = 'phoneID';

	public function user()
    {
        return $this->belongsToMany('User', 'users_has_phones', 'users_has_phonesID', 'userID', 'phoneID');
    }

 	public function images() {
 		return $this->belongsToMany('Images', 'phones_has_images', 'phones_has_imagesID', 'imageID', 'phoneID');
 	}
}
