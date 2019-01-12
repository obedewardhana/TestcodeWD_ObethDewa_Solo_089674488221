<?php
class User_model extends CI_Model{

	private $primary_key='user_id';
    private $table_name='user';
 
  function cek_user($data) {
            $this->db->where('user_email', $this->input->post('user_email'));
            $this->db->where('user_password', md5($this->input->post('user_password')));
            $query = $this->db->get('user', $data);
            return $query;
        }

  function insertmember ($data){
		$this->db->insert('user',$data);
			}
 
}
 