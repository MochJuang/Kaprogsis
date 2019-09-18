<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_model extends CI_Model {

	public function get_saldo()
		{
			$this->db->select('saldo');
			$awal =  $this->db->get('tb_kas')->result_array();
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

	public function jum_tgl_pemasukan($date_1,$date_2)
	{
		$query = "SELECT * FROM tb_kas WHERE aksi = 'Pemasukan' AND (tanggal between '$date_1' AND '$date_2' ) ORDER BY tanggal DESC";
		$data = $this->db->query($query)->result();
		$jumlah['pemasukan'] = 0;
		foreach ($data as $data) {
			$jumlah['pemasukan'] = $jumlah['pemasukan'] + $data->nominal;
		}
		return $jumlah['pemasukan'];
	}
	public function jum_tgl_keluaran($date_1,$date_2)
	{
		$query = "SELECT * FROM tb_kas WHERE aksi = 'Keluaran' AND (tanggal between '$date_1' AND '$date_2' ) ORDER BY tanggal DESC";
		$data = $this->db->query($query)->result();
		$jumlah['keluaran'] = 0;
		foreach ($data as $data) {
			$jumlah['keluaran'] = $jumlah['keluaran'] + $data->nominal;
		}
		return $jumlah['keluaran'];
	}
	public function jum_tgl_total($date_1,$date_2)
	{
		$query = "SELECT * FROM tb_kas WHERE (tanggal between '$date_1' AND '$date_2' ) ORDER BY tanggal DESC";
		$data = $this->db->query($query)->result();
		$jumlah['jumlah_total'] = 0;
		foreach ($data as $data) {
			$jumlah['jumlah_total'] = $jumlah['jumlah_total'] + $data->nominal;
		}
		return $jumlah['jumlah_total'];
	}
	public function data_jumlah($date_1,$date_2)
	{
		$query = "SELECT * FROM tb_kas WHERE (tanggal between '$date_1' AND '$date_2' ) ORDER BY tanggal DESC";
		$data['kas'] = $this->db->query($query)->result_array();
		$data['pemasukan'] = $this->jum_tgl_pemasukan($date_1,$date_2);
		$data['keluaran'] = $this->jum_tgl_keluaran($date_1,$date_2);
		$data['total'] = $this->jum_tgl_total($date_1,$date_2);
		return $data;
	}

}

 

/* End of file Kas_model.php */
/* Location: ./application/models/Kas_model.php */