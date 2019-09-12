<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $title = 'Dasboard';
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			redirect('Log','refresh');
		}
	}
	public function index()
	{
		$data['saldo_akhir'] = $this->kas_model->saldo_akhir();
		$data['user']	= count($this->db->get('tb_userdetail')->result_array());
		$data['invoice']	= count($this->db->get('tb_invoice')->result_array());
		$data['produk']	= count($this->db->get('tb_barang_jasa')->result_array());
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('dasboard/dasboard');	
		$this->load->view('templates/footer');	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home','refresh');
	}
	public function profile()
	{
		$data['title'] = $this->title;
		$data['profile'] = $this->db->get_where('tb_userdetail',['nama' => $this->session->userdata('user')])->row_array();
		$this->load->view('templates/header',$data);	
		$this->load->view('profile', $data);
		$this->load->view('templates/footer');	
		// print_r($data);
	}
	public function edit_profile()
	{
		$data = $this->db->get_where('tb_userdetail', ['Nama' => $this->session->userdata('user')])->row_array();
		echo json_encode($data);
	}
	public function edit_form($value='')
	{
		$this->db->where('Nama', $this->session->userdata('user'));
		$data = $this->db->update('tb_userdetail', [
			'Kamar'	=> $this->input->post('Kamar'),
			'Alamat'	=> $this->input->post('Alamat'),
			'facebook'	=> $this->input->post('Facebook'),
		]);
		if ($data) {
			// print_r($this->db->get_compiled_update());
			redirect('home/profile','refresh');
		}
	}
	public function edit_pass()
	{
		$data = $this->db->get_where('tb_userdetail', ['Nama' => $this->session->userdata('user')])->row();
		$data_user = $this->db->get_where('tb_user',['username' => $data->username])->row();
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
		// exit();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_lama', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('home/profile','refresh');
		} else {
			$user = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$pass_lama = md5($this->input->post('password_lama') );
			if ($pass_lama === $data_user->password) {
				$this->db->where('id_user', $data_user->id_user);
				$this->db->update('tb_user', ['username' => $user,'password' => $password]);
				$this->session->set_flashdata('pesan_user','<div class="alert alert-success alert-dismissible">Data Berhasil Di Ubah <span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('home/profile','refresh');
			}
			else{
				$this->session->set_flashdata('pesan_user','<div class="alert alert-danger alert-dismissible">Password Lama Kamu Salah <span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('home/profile','refresh');
			}
		}

		
		
	}
	public function edit_masuk($id)
	{
		$data = $this->db->get_where('tb_user',['id_user' => $id])->row_array();
		echo json_encode($data);
	}
	public function act_edit_masuk($value='')
	{
		$this->db->where('id_user', $this->input->post('id_user'));
        $data = $this->db->update('tb_user', ['username' => $this->input->post('username_user'),'password'=>md5($this->input->post('password_user'))]);
		if ($data) {
				$this->session->set_flashdata('pesan_user','<div class="alert alert-success alert-dismissible">User Berhasil Di Ubah<span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('home/profile','refresh');
		}
	}
	public function add_user()
	{
		echo "<pre>";
		print_r($_POST);
		print_r($_FILES);
		echo "</pre>";
		$data_user = [
			'username' 	=>	$this->input->post('username_user'),
			'Nama'		=>	$this->input->post('nama_user'),
			'Kelas'		=>	$this->input->post('kelas_user'),
			'Kamar'		=>	$this->input->post('kamar_user'),
			'Alamat'	=>	$this->input->post('alamat_user'),
			'divisi'	=>	$this->input->post('divisi_user'),
			'foto'		=>	$_FILES['foto_user']['name'],
			'facebook'	=>	$this->input->post('facebook_user'),
			'golongan'	=>	$this->input->post('jenkel_user')
		];
		$data_userdetail = [
			'username'		=> $this->input->post('username_user'),
			'password'		=> md5($this->input->post('password_user')),
			'role_id'		=> $this->input->post('role_id')
		];
		$this->db->insert('tb_user', $data_userdetail);
		$this->db->insert('tb_userdetail', $data_user);

		$config['upload_path'] =  './assets/foto_kaprog';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '5000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_user')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			redirect('log','refresh');
		}
	}

	public function delete_user($id)
	{
		$data = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
		$data_u = $this->db->get_where('tb_userdetail', ['username' => $data['username']])->row_array();
		$this->db->delete('tb_user',['id_user' => $data['id_user']]);
		$this->db->delete('tb_userdetail',['id_detail' => $data_u['id_detail']]);
		redirect('home/profile','refresh');
	}
	public function edit_foto($id)
	{
		$config['upload_path'] = './assets/foto_kaprog';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('editfoto')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan_user','<div class="alert alert-danger alert-dismissible"> '.$error.' <span class="close" data-dismiss="alert">&times;</span></div>');

			redirect('home/profile','refresh');
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$this->db->where('id_detail', $id);
			$this->db->update('tb_userdetail', ['foto' => $_FILES['editfoto']['name']]);
			redirect('home/profile','refresh');
		}
	}
	public function empty_pesan()
	{
		$this->db->query('truncate tb_pesan');
		redirect('home/profile','refresh');
	}
	public function looping($value='')
	{
		$this->load->view('coba');
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */