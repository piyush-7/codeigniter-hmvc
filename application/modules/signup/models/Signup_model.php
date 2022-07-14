<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        
    }
    
    public function create_user($data=array())
    {
        //insert orations

        if($this->db->insert('tbl_users', $data)):

            return true;
        else:
            return false;
        endif;
        
    }


    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $q= $this->db->get();
       
       $r= $q->result();
       return $r;
        
        
        
    }
    

}

/* End of file ModelName.php */
