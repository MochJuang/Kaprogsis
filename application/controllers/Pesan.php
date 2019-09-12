<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function kirim()
	{
		$data = $this->db->get_where('tb_userdetail',['Nama' => $this->session->userdata('user')])->row_array();
		$foto = $data['foto'];
		
		$pesan = $this->input->post('pesan');
		$user = $this->session->userdata('user');
		$waktu = date('Y-m-d H:s:i');
		$data = [
			'user'		=> $user,
			'waktu'		=> $waktu,
			'pesan'		=> $pesan,
			'foto'		=> $foto
		];	
		$this->db->insert('tb_pesan', $data);
		json_encode('berhasil');
	}
	public function tampil()
	{
		$data = $this->db->order_by('id_pesan','asc')->get('tb_pesan')->result_array();
		$isi = '';
		// $data['waktu'] = date('d-m-Y H:s:i',strtotime($data['waktu']));
		echo json_encode($data);
	}


}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */