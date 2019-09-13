<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uang_kas extends CI_Controller {
	private $title = 'Uang Kas';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}
	public function index()	
	{
		$data['jmlh_pemasukan'] = $this->kas_model->jmlh_pemasukan();
		$data['jmlh_keluaran'] = $this->kas_model->jmlh_keluaran();
		$data['jmlh_seluruh'] = $this->kas_model->jmlh_seluruh();
		$data['saldo_akhir'] = $this->kas_model->saldo_akhir();
		$data['kas'] = $this->db->order_by('tanggal','desc')->get('tb_kas')->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('uang_kas/index',$data);	
		$this->load->view('templates/footer');	
	}
	public function tambah_pemasukan()
	{
		$aksi = "Pemasukan" ;
		$masuk = $this->kas_model->get_saldo();
		$masuk = intval($masuk['saldo']);
		$saldo =  intval($this->input->post('nominal'));
		$saldo_akhir = $masuk + $saldo;
		// $waktu = strtotime($this->input->post('waktu'));
		$waktu = date('Y-m-d H:s:i');
		$data = [
			'tanggal' 	=> $waktu,
			'aksi'		=> "Pemasukan",
			'deskripsi'	=> $this->input->post('deskripsi'),
			'nominal'	=> $this->input->post('nominal'),
			'saldo'		=> $saldo_akhir
		];
		$this->db->insert('tb_kas', $data);
		redirect('uang_kas/index','refresh');
	}
	public function tambah_keluaran()
	{
		$aksi = "Keluaran" ;
		$masuk = $this->kas_model->get_saldo();
		$masuk = intval($masuk['saldo']);
		$saldo =  intval($this->input->post('nominal'));
		$saldo_akhir = $masuk - $saldo;

		// $waktu = strtotime($this->input->post('waktu'));
		$waktu = date('Y-m-d H:s:i');
		$data = [
			'tanggal' 	=> $waktu,
			'aksi'		=> $aksi,
			'deskripsi'	=> $this->input->post('deskripsi'),
			'nominal'	=> $this->input->post('nominal'),
			'saldo'		=> $saldo_akhir
		];
		$this->db->insert('tb_kas', $data);	
		redirect('uang_kas/index','refresh');
	}
	public function print()
	{
		$data['kas'] = $this->db->order_by('tanggal','desc')->get('tb_kas')->result_array();
		$this->load->view('uang_kas/print',$data);

	}

}

/* End of file Uang_kas.php */
/* Location: ./application/controllers/Uang_kas.php */