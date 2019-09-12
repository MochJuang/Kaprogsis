<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function kode_barang()
    {
        $kode = $this->db->query("SELECT max(kode_barang) as maxKode FROM tb_barang_jasa")->row_array();
        $kode = $kode['maxKode'];
        return $noUrut = (int) substr($kode, 3, 3);
    }

	public function tambah($data)
    {
        return $this->db->insert('tb_barang_jasa', $data);
    }
    public function semua()
    {
    	return $this->db->get('tb_barang_jasa')->result_array();
    }
    public function barang()
    {
    	return $this->db->get_where('tb_barang_jasa',['kategori' => 'barang'])->result_array();
    }
    public function jasa()
    {
    	return $this->db->get_where('tb_barang_jasa',['kategori' => 'jasa'])->result_array();
    }

}

/* End of file barang_model.php */
/* Location: ./application/models/barang_model.php */