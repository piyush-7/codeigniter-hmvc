<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        $this->load->module('school');
        // $this->load->library('');
        // $this->load->helper('');
        
        // $this->load->database();
        
        
    }
    

    public function msg()
    {
        echo "this is HMVC pattern";
        echo '<br/>';
        
        // $this->load->module('school');

        $this->school->school_add();
    }
    public function show()
    {
        echo "this show method";
          
        $c['msg'] = "this is HMVC structure";

        $this->load->view('message/msgview',$c);
        
    }

}

/* End of file Controllername.php */





?>