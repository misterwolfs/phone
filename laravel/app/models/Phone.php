<?php

class Phone extends Eloquent {

	protected $guarded = array('id', 'phoneID');
	public $timestamps = false;

	protected $table = 'phones';

	public function user()
    {
        return $this->belongsTo('User');
    }
}
