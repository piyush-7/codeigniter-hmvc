<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->p = $this->load->database('p',TRUE);
 
         $this->load->model('Login_model');

         $this->load->helper('login/jwt');
    }
    
    public function register_user()
    {
        
        //form-validation

    
            if($this->form_validation->run($this->form_validation->set_rules('name','Name','required|min_length[4]|alpha'))===FALSE):
		
            
                echo json_encode(['404'=>'Minimum should be 4 char']);

                elseif($this->form_validation->run( $this->form_validation->set_rules('email','Email','required|min_length[5]|valid_email|valid_emails|is_unique[login.email]'))===FALSE):

                    echo json_encode(['404'=>'Email Should Be Unique and Valid with min-length 5 char']);

                

                elseif($this->form_validation->run($this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]'))===FALSE):

                    echo json_encode(['404'=>'Password should be min-8 & max-15 char']);

                

                elseif($this->form_validation->run( $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]|numeric'))===FALSE):
                    echo json_encode(['404'=>'Mobile should be 10 numeric digit']);

                 
            else:
                $form_data = $this->input->post();
    
                $insert_data = array('name'=>$form_data['name'],
                                    'email'=>$form_data['email'],
                                    'password'=>$form_data['password'],
                                    'mobile'=>$form_data['mobile']);




                //    data insert in db
               
                if($this->Login_model->create_user($insert_data)):
    
                    echo json_encode(['201'=>'Success']);
    
                else:
                    echo json_encode(['404'=>'Not Found']);

                endif;
    



            endif;
           
            
    }

}