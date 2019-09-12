<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->form_validation->set_rules('user', 'Username', 'trim|required|min_length[2]',[
			'required' => "Username Tidak Boleh Kosong",
		]);
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[2]',[
			'required' => "Password Tidak Boleh Kosong",
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');			
		} else {
			if ($this->user_model->login(['username' => set_value('user') , 'password' => md5(set_value('pass'))])) {
				$user = $this->input->post('user');
				$pass = $this->input->post('pass');
				$nama = $this->user_model->nama(set_value('user'));
				$role_id = $this->db->get_where('tb_user',['username' => $user])->row_array()['role_id'];
				switch ($role_id) {
					case '0':
						$ses = ['user' => $nama, 'status'=>'login','akses' => 'user' ];
						break;
					case '1':
						$ses = ['user' => $nama, 'status'=>'login' ,'akses' => 'admin'];
						break;
					case '2':
						$ses = ['user' => $nama, 'status'=>'login' ,'akses' => 'superadmin'];
						break;

				}
				$this->session->set_userdata($ses);
				redirect('home','refresh');
			}
			else{			
				$this->session->set_flashdata('data_error', '<div class="alert alert-danger alert-dismissible">Maaf Username atau Password Tidak Ada<span class="close" data-dismiss="alert">&times;</span></div>');
					redirect('log','refresh');
			}
		}
	}

}

/* End of file Log.php */
/* Location: ./application/controllers/Log.php */