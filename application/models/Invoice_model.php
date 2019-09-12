<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	public function get_barang()
	{
		return $this->db->get('tb_barang_jasa')->result_array();		
	}	

}

/* End of file Invoice_model.php */
/* Location: ./application/models/Invoice_model.php */