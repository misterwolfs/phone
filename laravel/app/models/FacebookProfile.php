<?php 

class FacebookProfile extends Eloquent {

	public function user() {
		return $this->belongsTo('FacebookUser');
	}

}