<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	private $title = 'invoice';
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}

	public function index()
	{
		$data['invoice'] = $this->db->get('tb_invoice')->result_array();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('invoice/index',$data);	
		$this->load->view('templates/footer');	
	}
	public function tambah_invoice($value='')
	{
		$data['produk']= $this->invoice_model->get_barang();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('invoice/tambah_invoice',$data);	
		$this->load->view('templates/footer');	
		
	}
	public function reload_data()
	{
		$data=$this->input->post('data');
		$produk = $this->db->get_where('tb_barang_jasa', ['nama_barang_jasa' => $data])->row_array();
		echo json_encode($produk);
	}
	public function tambah()
	{
		$input = '01234567890QWERTYUIOPLKJHGFDSAZXCVBNM';
		
		$id = substr(str_shuffle($input), 0, 6);
		$user = $this->session->userdata('user');
		$penerima = $this->input->post('kepada');
		$jumlah_total = $this->input->post('jumlah_total');
		$data = [
			'id_invoice' 	=> $id,
			'user' 			=> $user,
			'penerima'		=> $penerima,
			'tempat'		=> 'Di Tempat',
			'jumlah_total' 	=> $jumlah_total,
			'tanggal' 		=> date('Y-m-d H:s:i'),
			'status'		=> $this->input->post('status')

		];
		$this->db->insert('tb_invoice', $data);

		$masuk = $this->kas_model->get_saldo();
		$masuk = intval($masuk['saldo']);
		$jumlah_total =  intval($jumlah_total);
		$jumlah_total_akhir = $masuk + $jumlah_total;
		$data_kas = [
			'tanggal'  => date('Y-m-d H:s:i'), 
			'aksi'		=> 'Pemasukan',
			'deskripsi'  => 'Unit Produksi',
			'nominal'	=> $jumlah_total,
			'saldo'		=> $jumlah_total_akhir
		];
		$this->db->insert('tb_kas', $data_kas);
		echo json_encode($id);

	}
	public function tambah_pesanan()
	{
		$data = [
			'id_invoice' 		=> $this->input->post('id_invoice'),
			'kode_barang'		=> $this->input->post('kode_barang'),
			'nama_barang_jasa'	=> $this->input->post('nama_barang'),
			'harga'				=> $this->input->post('harga'),
			'qty'				=> $this->input->post('qty'),
			'jumlah'			=> $this->input->post('subtotal')
		];
		$this->db->insert('tb_pesanan', $data);
		////masukkan data 
		$data_penjualan = $this->db->get_where('tb_barang_jasa',['kode_barang' => $this->input->post('kode_barang')])->row_array()['terjual'];
		$data_penjualan = intval($data_penjualan);
		$qty = intval($this->input->post('qty'));
		$hasil = $data_penjualan + $qty;
		$this->db->where('kode_barang', $this->input->post('kode_barang'));
		$this->db->update('tb_barang_jasa', ['terjual' => $hasil]);


		echo json_encode($this->input->post('id_invoice'));


	}
	public function print($id)
	{
		$data['invoice'] =  $this->db->get_where('tb_invoice', ['id_invoice' => $id])->row_array();
		$data['pesanan'] =   $this->db->get_where('tb_pesanan', ['id_invoice' => $id])->result_array();
		$this->load->view('invoice/print',$data);	
	}
	public function detail_invoice($id)
	{
		$data['title'] = $this->title;
		$data['invoice'] =  $this->db->get_where('tb_invoice', ['id_invoice' => $id])->row_array();
		$data['pesanan'] =   $this->db->get_where('tb_pesanan', ['id_invoice' => $id])->result_array();
		$this->load->view('templates/header',$data);	
		$this->load->view('invoice/detail_invoice', $data);
		$this->load->view('templates/footer');	
	}
}
