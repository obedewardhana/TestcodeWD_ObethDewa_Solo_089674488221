<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menu_model extends CI_Model {
 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function save ($person){
        $this->db->insert($this->table_name,$person);
        return $this->db->insert_id();
            }

 
}