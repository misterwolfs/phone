<?php

class Phone extends Eloquent {

	protected $guarded = array('id', 'phoneID');
	//public $timestamps = false;

	protected $table = 'phones';

	protected $primaryKey = 'phoneID';

	public function user()
    {
        return $this->belongsToMany('User', 'users_has_phones', 'users_has_phonesID', 'userID', 'phoneID');
    }
}
