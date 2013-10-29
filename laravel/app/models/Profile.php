<?php
 
class Profile extends Eloquent {
 	
 	protected $primaryKey = 'profileID';

    public function user()
    {
        return $this->belongsTo('User');
    }
}