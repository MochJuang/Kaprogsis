<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_jasa extends CI_Controller {
	private $title = 'Barang_jasa';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}

	public function all_produk()
	{
		$this->datatables->select('*');
		$this->datatables->from('tb_barang_jasa');
		return print_r($this->datatables->generate());

	}

	public function semua()
	{
		$data['produk'] = $this->barang_model->semua();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('barangJasa/semua',$data);	
		$this->load->view('templates/footer');	
	}
	public function barang()
	{
		$data['produk'] = $this->barang_model->barang();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('barangJasa/barang',$data);	
		$this->load->view('templates/footer');	
	}
	public function jasa()
	{
		$data['produk'] = $this->barang_model->jasa();
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('barangJasa/jasa',$data);	
		$this->load->view('templates/footer');	
	}
	public function tambah()
	{
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric',[
			'numeric' => 'Harga Harus Berupa Angka'
		]);
		if ($this->form_validation->run() == FALSE) {
			redirect('barang_jasa/semua','refresh');
		} else {
			$input = '01234567890QWERTYUIOPLKJHGFDSAZXCVBNM';
			$id = substr(str_shuffle($input), 0, 4);;
			$data = [
				'kode_barang' 		=> $id,
				'nama_barang_jasa' 	=> $this->input->post('nama'),
				'harga' 			=> $this->input->post('harga'),
				'kategori' 			=> $this->input->post('kategori'),
				'deskripsi'			=> $this->input->post('deskripsi'),
				'terjual' 			=> 0,
				'foto' 				=> 'Tidak Ada'
			];
			if ($this->db->insert('tb_barang_jasa', $data)) {
				$this->session->set_flashdata('produksi', '<div class="alert alert-success alert-dismissible">Barang atau Jasa Berhasil di tambahlkan <span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('barang_jasa/semua','refresh');
			}
			else {
				$this->session->set_flashdata('produksi', '<div class="alert alert-danger alert-dismissible">Barang atau Jasa gagal Berhasil di tambahlkan <span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('barang_jasa/semua','refresh');
			}
		}
	}
	public function delete($value='')
	{
		$this->db->delete('tb_barang_jasa',['kode_barang' => $value]);
		$this->session->set_flashdata('produksi', '<div class="alert alert-success alert-dismissible">Barang atau Jasa dengan kode '.$value.' Berhasil di dihapus <span class="close" data-dismiss="alert">&times;</span></div>');
		redirect('barang_jasa/semua','refresh');
	}
	public function detail($id)
	{
		$data['title'] = $this->title;
		$data['produk'] = $this->db->get_where('tb_barang_jasa',['kode_barang' => $id])->row_array();
		$this->load->view('templates/header',$data);	
		$this->load->view('barangJasa/detail',$data);	
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('tb_barang_jasa', ['kode_barang' => $id])->row_array();
		echo json_encode($data);		
	}
	public function act_update()
	{
		$nama = $this->input->post('produk');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$data =[
			'nama_barang_jasa' 	=> $nama,
			'harga'				=> $harga,
			'deskripsi'			=> $deskripsi 
		];
		$this->db->where('kode_barang', $this->input->post('kode_barang'));
		$this->db->update('tb_barang_jasa', $data);
		$this->session->set_flashdata('produksi','<div class="alert alert-success alert-dismissible">Barang atau Jasa dengan kode '.$this->input->post('kode_barang').' Berhasil di ubah <span class="close" data-dismiss="alert">&times;</span></div>');
		redirect('barang_jasa/semua','refresh');
	}
	public function edit_foto($kode)
	{
		$config['upload_path'] = './assets/foto_produk';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('editfoto')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan_user','<div class="alert alert-danger alert-dismissible"> '.$error.' <span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('barang_jasa/detail/'.$kode,'refresh');
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$this->db->where('kode_barang', $kode);
			$this->db->update('tb_barang_jasa', ['foto' => $_FILES['editfoto']['name']]);
			redirect('barang_jasa/detail/'.$kode,'refresh');
		}
	}
}

/* End of file Barang_jasa.php */
/* Location: ./application/controllers/Barang_jasa.php */