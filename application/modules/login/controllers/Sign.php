<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends MY_Controller {

    public $p;
    public function __construct()
    {
        parent::__construct();
       
       $this->load->library('form_validation');

       $this->p = $this->load->database('p',TRUE);
       
    }
    

    public function sign_user()
    {
        //form-validation

        $this->form_validation->set_rules('name','Name','required|min_length[4]');
        $this->form_validation->set_rules('email','Email','required|min_length[5]');
        $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[20]');


        if($this->form_validation->run()==FALSE):

           echo json_encode(['msg'=>'not valid']);

           

        else:
            $form_data = $this->input->post();

            $insert_data = array('name'=>$form_data['name'],
                                'email'=>$form_data['email'],
                                'password'=>$form_data['password']);
            //    data insert in db
            if($this->p->insert('user',$insert_data)):
                echo json_encode(['msg'=>'success']);
            endif;


        endif;
        
        



    }

}

/* End of file Controllername.php */
