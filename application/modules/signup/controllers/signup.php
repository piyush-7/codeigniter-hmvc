<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends MY_Controller {

    public $client;
    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        
        $this->load->library(array('form_validation','session'));
        $this->client = $this->load->database('client',TRUE);

        
        $this->load->model('Signup_model');
        


        
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
            // if($this->db->insert('tbl_users',$insert_data)):

                
            //     $this->session->set_flashdata('Success', 'Data insert Successfully');

            //     redirect('signup');
            // else:

            //     $this->session->set_flashdata('Error', 'Data insert Failed');
            //     redirect('signup');
            // endif;



                    //data insert through model
            if($this->Signup_model->create_user($insert_data)):

                        
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

    public function get_all_user()
    {
        // $this->db->select('*');
        // $this->db->from('tbl_users');
        // $this->db->result();

        // $result=$this->db->get('tbl_users');

        // echo json_encode($result);

        $query = $this->db->get('tbl_users');

        foreach ($query->result() as $row)
        {
                // echo $row->name;

                echo json_encode($row->name);
                echo json_encode($row->email);
                echo json_encode($row->mobile);
        }

        
        
    }

    public function get()
    {
        // $this->db->select('*');
        // $this->db->from('tbl_users');
        // $q=$this->db->get();

        // $r=$q->result();
        //  echo json_encode($r);

         //get data through the model

         $r = $this->Signup_model->get_users();
         echo json_encode($r);

       
    }

    public function client_get()
    {
        $this->client->select('*');
        $this->client->from('client');
        $q = $this->client->get();

        $r = $q->result();

        echo json_encode($r);
    }

}

/* End of file Controllername.php */



?>