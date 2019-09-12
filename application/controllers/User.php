<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	private $title = 'user';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('Log','refresh');
		}
	}
	public function male()
	{
		$data['user'] = $this->db->get_where('tb_userdetail', ['golongan' => 'Putra'])->result_array();
		// print_r($data['user']);
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('user/male');	
		$this->load->view('templates/footer');	
	}
	public function female()
	{
		$data['user'] = $this->db->get_where('tb_userdetail', ['golongan' => 'Putri'])->result_array();
		// print_r($data['user']);die;
		$data['title'] = $this->title;
		$this->load->view('templates/header',$data);	
		$this->load->view('user/female');	
		$this->load->view('templates/footer');	
	}
	public function detail($id)
	{
		$data = $this->db->get_where('tb_userdetail',['id_detail' => $id])->row_array();
		echo json_encode($data);
	}
}
