<?php
class facebook_Model extends CI_Model {

	public function __construct()
	{
		/* LOAD DATABASE */
		$this->load->database();
		
		// LOAD ALL LIBRARIES */
		//$this->load->library('session');
	}
	
	public function insertFacebookUser($data)
	{	
		echo '<pre>';
		print_r($data);
		echo '<pre>';

		

		$user = array(
		   'firstname' => $data['first_name'],
		   'lastname' => $data['last_name'],
		   'facebook' => $data['link'],
		   'email' => $data['email')]
		);
		
		$this->db->insert('user', $user); 
	}

}
