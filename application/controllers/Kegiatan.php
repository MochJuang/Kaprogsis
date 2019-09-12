<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	private $title = 'kegiatan';
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['kegiatan'] = $this->db->get('tb_kegiatan')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('kegiatan/index', $data);
		$this->load->view('templates/footer');
	}
	public function detail($id)
	{
		$data['data'] = $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header', $data);
		$this->load->view('kegiatan/detail', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data = [
			'nama_kegiatan'		=> $this->input->post('nama_kegiatan'), 
			'waktu_pelaksanaan'	=> $this->input->post('waktu_kegiatan'),
			'tempat_kegiatan'	=> $this->input->post('tempat_kegiatan'),
			'di_hadiri_oleh'	=> $this->input->post('dihadiri'),
			'waktu_kegiatan'	=> $this->input->post('lama_kegiatan'),
			'dana'				=> $this->input->post('dana'),
			'deskripsi'			=> $this->input->post('deskripsi')
		];
		$this->db->insert('tb_kegiatan', $data);
		$this->session->set_flashdata('kegiatan', '<div class="alert alert-success alert-dismissible">Kegiatan Berhasil Di Tambah <span class="close" data-dismiss="alert">&times;</span></div>');; 
		redirect('kegiatan','refresh');
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */