<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_all extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
       
       $this->load->library('form_validation');

       $this->load->database('p',TRUE);

        $this->load->model('Login_model');
        $this->load->helper('url_helper');
       
       
    }

    public function get_all_data()
    {
        $r = $this->Login_model->login_users();
        echo json_encode($r);
    }
}