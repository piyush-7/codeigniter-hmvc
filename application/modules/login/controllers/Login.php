<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public $p;
    public function __construct()
    {
        parent::__construct();
       
       $this->load->library('form_validation');

       $this->p = $this->load->database('p',TRUE);

        $this->load->model('Login_model');
        $this->load->helper('url_helper');
        $this->load->helper('login/jwt');

       
    }
    

    public function sign_user()
    {
        //form-validation

        // $password = [$regex_lowercase = '/[a-z]/',
		// $regex_uppercase = '/[A-Z]/',
		// $regex_number = '/[0-9]/',
		// $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/'];

		

        $this->form_validation->set_rules('name','Name','required|min_length[4]|alpha');
        $this->form_validation->set_rules('email','Email','required|min_length[5]|valid_email|valid_emails|is_unique[login.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]|numeric');
       
       
        if($this->form_validation->run()==FALSE):

            echo json_encode(['error'=>'not valid']);
            
           
        else:
            $form_data = $this->input->post();

            $insert_data = array('name'=>$form_data['name'],
                                'email'=>$form_data['email'],
                                'password'=>$form_data['password'],
                                'mobile'=>$form_data['mobile']);
            //    data insert in db
            // if($this->p->insert('user',$insert_data)):
            //     echo json_encode(['msg'=>'success']);
            // endif;



            if($this->Login_model->create_user($insert_data)):

                        
                // $this->session->set_flashdata('Success', 'Data insert Successfully');
                echo json_encode(['201'=>'Success']);

                // redirect('signup');
            else:

                // $this->session->set_flashdata('Error', 'Data insert Failed');

                // redirect('signup');
                echo json_encode(['404'=>'Not Found']);
            endif;

        


        endif;

    }

   public function login_get()
   {
    $r = $this->Login_model->login_users();
    echo json_encode($r);

   }

//    public function login()  
//     {  
//         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//         $this->form_validation->set_rules('password', 'Password', 'required');
        
//         if($this->form_validation->run()==TRUE):

//             echo json_encode(['Login'=>'success']);

//         else:
            
//             echo json_encode(['error'=>'Not valid user']);
            
//         endif;

//     }


    public function update($data) //working
    {

        // $user = $this->Login_model->update_id();


        
        $this->form_validation->set_rules('name','Name','required|min_length[4]|alpha');
        $this->form_validation->set_rules('email','Email','required|min_length[5]|valid_email|valid_emails|is_unique[login.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]|numeric');
       
 
 
         
 
         if ($this->form_validation->run()==FALSE)
         {  
             
             echo json_encode(['400'=>'Not valid']);
         }
         else


         { 
            // $form_data['name'] = $this->input->post('name');
            // $form_data['email']  = $this->input->post('email');
            // $form_data ['password'] = $this->input->post('password');
            // $form_data['mobile']  = $this->input->post('mobile');

            // $insert_data = array('name'=>$form_data['name'],
            //                     'email'=>$form_data['email'],
            //                     'password'=>$form_data['password'],
            //                     'mobile'=>$form_data['mobile']);
            //    data insert in db

            if($this->Login_model->update_item($data)):

                        
                // $this->session->set_flashdata('Success', 'Data insert Successfully');
                echo json_encode(['201'=>'update']);

                // redirect('signup');
            else:

                // $this->session->set_flashdata('Error', 'Data insert Failed');

                // redirect('signup');
                echo json_encode(['400'=>'Error']);
            endif;
            
         }

    }

    // public function store()
    // {
 
    //     // $id=$this->uri->segment(3);
    //     $this->form_validation->set_rules('name','Name','required|min_length[4]|alpha');
    //     $this->form_validation->set_rules('email','Email','required|min_length[5]|valid_email|valid_emails|is_unique[login.email]');
    //     $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]');
    //     $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]|numeric');
 
    //     $id = $this->input->post('id');
 
    //     if ($this->form_validation->run() == FALSE)
    //     {  
    //         if(empty($id))
    //         {
    //           echo json_encode(['msg'=>'data not available']);
    //         }
    //     }
    //     else
    //     {
    //         $this->Login_model->createOrUpdate();
    //         echo json_encode(['success'=>'201']);
            
    //     }
         
    // }




//     public function update_data($id)
//   {
    

//     $this->form_validation->set_rules('name','Name','required|min_length[4]|alpha');
//     $this->form_validation->set_rules('email','Email','required|min_length[5]|valid_email|valid_emails|is_unique[login.email]');
//     $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]');
//     $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[10]|numeric');
 
//     if ($this->form_validation->run()==FALSE)
//     {
//         echo json_encode(['msg'=>'Not valid']);
//     }
//     else
//     {
//         $this->Login_model->update($id);
//        echo json_encode(['Success'=>'201']);
       
//     }
 
//   }

  public function delete()
    {
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            echo json_encode(['404'=>'Data Not Found']);
        }

        else{

             $this->Login_model->delete($id);

            echo json_encode(['200'=>'Delete']);

        }
                    
    }

    public function user()
    {
        $jwt = new JWT();

        $jwtsecretkey = "myloginsecret";

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->Login_model->check_login($email,$password);

        $token = $jwt->encode($result,$jwtsecretkey,'HS256');


        // $token = $this->input->post('token');
        // return  $this->p->update('login',$token);


        // echo json_encode($token);

        if($result==TRUE):
            echo json_encode(['login'=>'success',
                            'Token'=>$token,
                            'data'=>$result]);

        else:
            echo json_encode(['404'=>'error']);


        endif;
    }


    public function show_one($id) 
    {
        $task = $this->p->where(['id' => $id])->get('login')->row();

        if($this->p->where(['id' => $id])->get('login')->row()==true):

            echo json_encode(['Data Found'=>$task]);

        else:
            echo json_encode(['404'=>'Data Not Found']);


        endif;

        

    }


}

/* End of file Controllername.php */
