<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        
        $this->load->library('form_validation');

        
    }
    

    public function user_layout()
    {
        
        $this->load->view('signup/user_register');
        
    }

    public function user_submit()
    {
        
        //form-validation

        $this->form_validation->set_rules('name','Name','required|min_length[6]');
        $this->form_validation->set_rules('email','Email','required|min_length[5]');
        $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|max_length[10]|numeric');

        if($this->form_validation->run()==false):
            $this->load->view('signup/user_register');
        else:
            // echo 'form submit successfully';
            // echo json_encode($this->input->post());

            $form_data = $this->input->post();

            $insert_data = array('name'=>$form_data['name'],'email'=>$form_data['email'],'mobile'=>$form_data['mobile']);


            //data insert in db
            if($this->db->insert('tbl_users',$insert_data)):
                
                $this->session->set_flashdata('Success', 'Data insert Successfully');

                redirect('signup');
            else:

                $this->session->set_flashdata('Error', 'Data insert Failed');
                redirect('signup');
            endif;

        endif;


    //    print_r($this->input->post());

    //  echo json_encode($this->input->post());
        
    }

}

/* End of file Controllername.php */



?>