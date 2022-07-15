<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('migration','form_validation'));

    }
    

    public function test_msg()
    {
        echo "this is hmvc";
    }

    public function run_migration()
    {
       if ($this->migration->current() === FALSE):

        show_error($this->migration->error_string());
        // echo "Migration has been succesfully";

       else:
        echo "migration has been successfully";
      
       endif;
    
       
    }


    public function create_book()
    {
        
        $this->load->view('book/bookview');
        
    }

    public function submit_book()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('author', 'Author', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('publication', 'Publication', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[5]|max_length[150]');

        if($this->form_validation->run()===FALSE):

            $this->load->view('book/bookview');

        else:
            
            


        endif;
        
    }


    public function list_book()
    {
        
    }



}

/* End of file Controllername.php */




?>