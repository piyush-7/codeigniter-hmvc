<?php
//parent controller for our moduler based controllers


class MY_Controller extends MX_Controller{

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        $this->load->module('school');

        $this->load->helper('url');
        
        
    }
    
}







?>