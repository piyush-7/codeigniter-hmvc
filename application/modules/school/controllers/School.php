<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends MY_Controller {


    
    public function __construct()
    {
        parent::__construct();
        // $this->load->module('message');
    }
    

    public function school_name()
    {
        echo "this is school of computer science";
    }
    public function school_add()
    {
        echo "school name is hmvc";
    }

}

/* End of file Controllername.php */
