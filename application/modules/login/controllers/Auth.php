<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('login/jwt');
        
    }
    

    public function token()
    {
        $jwt = new JWT();

        $jwtsecretkey = "mysecretwordshere";
        $data = array('user'=>'piyush','email'=>'piyush@gmail.com','type'=>'admin');

        $token  = $jwt->encode($data,$jwtsecretkey,'HS256');
        echo $token;
    }


    public function decode_token()
    {
        $token = $this->uri->segment(3);

        $jwt = new JWT();

        $jwtsecretkey = "mysecretwordshere";

        $decodetoken  = $jwt->encode($token,$jwtsecretkey,'HS256');

        // echo json_encode($decodetoken);

        $token1 = $jwt->jsonEncode($decodetoken);

        echo $token1;
        
        
    }


    public function login()
    {
        $jwt = new JWT();

        $jwtsecretkey = "myloginsecret";

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->Login_model->check_login($email,$password);

        $token = $jwt->encode($result,$jwtsecretkey,'HS256');

        echo json_encode($token);
    }
}