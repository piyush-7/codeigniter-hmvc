<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $p;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->p = $this->load->database('p',TRUE);

        
    }
    
    public function create_user($data=array())
    {
        //insert orations

        if($this->p->insert('login', $data)):

            return true;
        else:
            return false;
        endif;
        
    }


    public function login_users()
    {
        $this->p->select('*');
        $this->p->from('login');
        $q= $this->p->get();
       
       $r= $q->result();
       return $r;
        
    }

    public function check_user($email)
    {
        $this->p->where('email',$email);

        return $row = $this->p->get('login')->row_array();
    }
    
    /////////////////////////////////////////////////

    function update_id($id,$data=array()) 
    { 
        
          
        $this->p->where('id', $id); 
        // $user = $this->p->get('login')->row_array();
        if($this->p->update('login',$data)):
        

            return true;

        else:
            
                return false;
            

        endif;
    } 


/////////////////////////////////////////////////////////////////

    public function update_item($id,$data=array()) 
{
    $data=array(
        'name' => $this->input->post('name'),
        'email'=> $this->input->post('email'),
        'password' => $this->input->post('password'),
        'mobile' => $this->input->post('mobile'),
    );
    if($id==0){
        return $this->p->insert('login',$data);
    }
    else
    {
        $this->p->where('id',$id);
        return $this->p->update('login',$data);
    }        
    


            // $this->p->set(array(
            // 'name' => $this->input->post('name'),
            // 'email'=> $this->input->post('email'),
            // 'password' => $this->input->post('password'),
            // 'mobile' => $this->input->post('mobile'));
            
        $this->db->where('id',$id);
        $this->db->update('login');
        }


        public function createOrUpdate()
        {
            
            $id = $this->input->post('id');
     
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'pasword' => $this->input->post('pasword'),
                'mobile' => $this->input->post('mobile'),

            );
            if (empty($id)) {
                
            } else {
                $this->p->where('id', $id);
                return $this->p->update('login', $data);
            }
        }


        //////////////////////////////////////////////////////////////

       

        public function get_user($id)
        {
            $this->p->where('id',$id);
            $user = $this->p->get('login')->row_array();

            return $user;
            
            
        }


    public function update($id) 
    {
        $data = [
            'name'=> $this->input->post('name'),
            'email'=> $this->input->post('email'),
            'password'=> $this->input->post('password'),
            'mobile' => $this->input->post('mobile'),
        ];
 
        $result = $this->p->where('id',$id)->update('login',$data);
        return $result;
                 
    }

    
    function delete($id) 
    { 
        $this->p->where('id', $id); 
        return $this->p->delete('login'); 
    } 


    public function check_login($email,$password)

    {
      $this->p->select('*')
              ->from('login')
              ->where('email',$email)
              ->where('password',$password);

              $query = $this->p->get();

              if($query->num_rows()>0):
                return $query->result_array();

              else:

                echo json_encode(['msg'=>'User Not Found']);
                
              endif;

            return $query;

              
    }
    
}

/* End of file ModelName.php */
