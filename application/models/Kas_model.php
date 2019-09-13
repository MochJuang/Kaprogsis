<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_model extends CI_Model {

	public function get_saldo()
		{
			$this->db->select('saldo');
			$awal =  $this->db->order_by('id_kas','desc')->get('tb_kas')->result_array();
			return $awal = end($awal);
		}	
	public function saldo_akhir()
	{
		$data = $this->db->select('saldo')->get('tb_kas')->result_array();
		$data =  end($data);
		return intval($data['saldo']);
	}
	public function jmlh_pemasukan()
	{
		$data = $this->db->select('nominal')->get_where('tb_kas',['aksi' => 'Pemasukan'])->result_array();
		$jumlah = 0;
		foreach ($data as $data) {
			$jumlah = $jumlah + $data['nominal'];
		}
		return $jumlah;

	}
	public function jmlh_keluaran()
	{
		$data = $this->db->select('nominal')->get_where('tb_kas',['aksi' => 'Keluaran'])->result_array();
		$jumlah = 0;
		foreach ($data as $data) {
			$jumlah = $jumlah + $data['nominal'];
		}
		return $jumlah;

	}
	public function jmlh_seluruh()
	{
		$data = $this->db->select('nominal')->get('tb_kas')->result_array();
		$jumlah = 0;
		foreach ($data as $data) {
			$jumlah = $jumlah + $data['nominal'];
		}
		return $jumlah;

	}

}

/* End of file Kas_model.php */
/* Location: ./application/models/Kas_model.php */