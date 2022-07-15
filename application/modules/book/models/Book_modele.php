<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Book_modele extends CI_Model {

public function __construct()
{
    parent::__construct();
    //Do your magic here
}

public function book_insert($data = array())
{
    $this->db->insert('Table');
    
}
    

}

/* End of file ModelName.php */
