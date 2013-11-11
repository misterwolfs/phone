<?php
 
class UserHasPhone extends Eloquent {
 
	protected $guarded = array('id', 'users_has_phonesID');
	//public $timestamps = false;

	protected $softDelete = true;
	protected $table = 'users_has_phones';

	protected $primaryKey = 'users_has_phonesID';
 
}