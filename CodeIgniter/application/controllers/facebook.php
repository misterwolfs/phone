<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facebook extends CI_Controller {
 
    public function __construct()
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);
        $this->load->model('facebook_model');
    }
 
    function index(){
        // Try to get the user's id on Facebook
        $userId = $this->facebook->getUser();
 
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
            $this->load->view('facebook_view', $data);
        } else {
            // Get user's data and print it
            $user = $this->facebook->api('/me');
            
            

            echo '<pre>';
            print_r($user);
            echo '</pre>';

            $this->facebook_model->insertFacebookUser($user);
        }
    }
 
}
 
?>