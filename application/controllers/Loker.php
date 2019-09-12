<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends CI_Controller {
	private $title = 'loker';
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}

	public function loker_a()
	{
		$data['loker'] = $this->db->get_where('tb_data_loker',['kategori' => 'A'])->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/loker_a');	
		$this->load->view('templates/footer');	
	}
	public function loker_b()
	{
		$data['loker'] = $this->db->get_where('tb_data_loker',['kategori' => 'B'])->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/loker_b',$data);	
		$this->load->view('templates/footer');	
	}
	public function loker_c()
	{
		$data['loker'] = $this->db->get_where('tb_data_loker',['kategori' => 'C'])->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/loker_c',$data);	
		$this->load->view('templates/footer');	
	}
	public function riwayat()
	{
		$data['title'] = $this->title;
		$data['riwayat'] = $this->db->order_by('tanggal','desc')->get('tb_riwayat')->result_array();
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/riwayat',$data);	
		$this->load->view('templates/footer');	
	}
	public function detail_riwayat($id)
	{
		$data['title'] = $this->title;
		$data['riwayat'] = $this->db->get_where('tb_riwayat', ['id_riwayat' => $id])->row_array();	
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/detail_riwayat',$data);	
		$this->load->view('templates/footer');	
	}
	public function transaksi()
	{
		$data['loker'] = $this->db->get('tb_transaksi')->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/transaksi',$data);	
		$this->load->view('templates/footer');	
	}
	public function tambah($m)
	{
		$input = '01234567890QWERTYUIOPLKJHGFDSAZXCVBNM';
		
		$id = substr(str_shuffle($input), 0, 3);
		$waktu = date('Y-m-d H:i:s');
		$kategori = $m;
		$no_loker = $this->input->post('no_loker');
		$nama = $this->input->post('Nama');
		$kelas = $this->input->post('kelas');
		$kamar = $this->input->post('Kamar');
		$jenis = $this->input->post('jenis');
		$merek = $this->input->post('Merek');
		$warna = $this->input->post('Warna');
		$ket = $this->input->post('ket');
		$data = [
			'id_loker' 		=> $id,
			'kategori'	 	=> $kategori,
			'no_loker'	 	=> $no_loker,
			'nama' 			=> $nama,
			'kelas' 		=> $kelas,
			'kamar'			=> $kamar,
			'type'			=> $jenis,
			'merek'			=> $merek,
			'warna'			=> $warna,
			'status'		=> $ket,
			'tanggal_bayar'	=> $waktu
		];
		$data_t = [
			'id_loker'			=> $id,
			'nama' 			=> $nama,
			'kelas' 		=> $kelas,
			'no_loker'	 	=> $no_loker
		];
		if ($ket == 'Lunas') {
			$masuk = $this->kas_model->get_saldo();
			$masuk = intval($masuk['saldo']);
			$harga = (strtoupper($m)=='B') ? 30000 : 50000;
			$jumlah_total_akhir = $masuk + $harga;
			$data_kas = [
			'tanggal'  => date('Y-m-d H:s:i'), 
			'aksi'		=> 'Pemasukan',
			'deskripsi'  => 'Loker',
			'nominal'	=> $harga,
			'saldo'		=> $jumlah_total_akhir
			];
			$this->db->insert('tb_kas', $data_kas);
		}
	$loker = $this->db->insert('tb_data_loker', $data);
		if ($loker) {
			$this->db->insert('tb_transaksi', $data_t);
			$this->session->set_flashdata('loker_a', '<div class="alert alert-success alert-dismissible">Data '.$id.' Berhasil Ditambahkan <span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('loker/loker_'.strtolower($m),'refresh');
		}
	}
	public function delete($id,$m)
	{
		$this->db->delete('tb_data_loker',['id_loker' => $id]);
		$this->session->set_flashdata('loker_a', '<div class="alert alert-success alert-dismissible">Data Berhasil '.$id.' Di Hapus <span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('loker/loker_'.strtolower($m),'refresh');
	}
	public function detail($id)
	{
		$data['title'] = $this->title;
		$data['data'] = $this->db->get_where('tb_data_loker', ['id_loker' => $id])->row_array();
		$this->load->view('templates/header',$data);	
		$this->load->view('loker/detail',$data);	
		$this->load->view('templates/footer');	

	}
	public function update($id)
	{
		$data['loker'] = $this->db->get_where('tb_data_loker', ['id_loker' => $id])->row_array();
		echo json_encode($data['loker']);
		
	}
	public function aksi_transaksi()
	{
		$aksi = ($this->input->post('aksi') == 'Ambil') ? 'Diambil' : 'Disimpan'; 
		$data = $this->db->get_where('tb_data_loker',['id_loker' => $this->input->post('id')])->row_array();
		$data = [
			'no_loker' 	=> $data['no_loker'],
			'tanggal'	=> date('Y-m-d H:i:s'),
			'kelas'		=> $data['kelas'],
			'nama'		=> $data['nama'],
			'user'		=> $this->session->userdata('user'),
			'status'	=> $aksi
		];
		$this->db->insert('tb_riwayat', $data);
		echo json_encode($aksi);
	}
	public function melunaskan($id)
	{
		$this->db->where('id_loker', $id);
		$this->db->update('tb_data_loker', ['status' => 'Lunas']);
		///
		$m = $this->db->get_where('tb_data_loker',['id_loker' => $id])->row_array()['kategori'];
		$masuk = $this->kas_model->get_saldo();
		$masuk = intval($masuk['saldo']);
		$harga = (strtoupper($m)=='B') ? 30000 : 50000;
		$jumlah_total_akhir = $masuk + $harga;
		$data_kas = [
			'tanggal'  => date('Y-m-d H:s:i'), 
			'aksi'		=> 'Pemasukan',
			'deskripsi'  => 'Loker',
			'nominal'	=> $harga,
			'saldo'		=> $jumlah_total_akhir
			];
			$this->db->insert('tb_kas', $data_kas);
		echo json_encode('Lunas');
	}
	public function act_update()
	{
		$kat = strtolower($this->input->post('kat'));
		$this->db->where('id_loker', $this->input->post('id_loker'));
		$data = [
			'no_loker'	=> $this->input->post('no_loker'),
			'nama'		=> $this->input->post('Nama'),
			'kelas'		=> $this->input->post('kelas'),
			'kamar' 	=> $this->input->post('Kamar'),	
			'type'		=> $this->input->post('jenis'),
			'merek' 	=> $this->input->post('Merek'),
			'warna'		=> $this->input->post('Warna')
		];
		$data = $this->db->update('tb_data_loker', $data);
		if ($data) {
			$this->session->set_flashdata('loker_a','<div class="alert alert-success alert-dismissible">Data '.$this->input->post('id_loker').' Berhasil Diubah <span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('loker/loker_'.$kat,'refresh');
		}
	}


}

/* End of file Loker.php */
/* Location: ./application/controllers/Loker.php */