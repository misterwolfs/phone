<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
 
    function index() {
    	$this->load->view('embeds/header');
    	$this->load->view('main_view');
    	$this->load->view('embeds/footer');
    }

    function addPhone() {
    	echo 'add phone';
    }
 
}
 
?>