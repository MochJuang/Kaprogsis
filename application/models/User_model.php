<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function nama($user)
	{
		$this->db->select('Nama');
		$query =  $this->db->get_where('tb_userdetail',['username' => $user])->row_array();
		return $query['Nama'];
	}
	// public function role_id($user,$pass)
	// {
	// 	return 
	// }
	public function login($where)
	{
		return $this->db->get_where('tb_user',$where)->num_rows();
	}
	public function ubah_nama($nama)
	{
		
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */