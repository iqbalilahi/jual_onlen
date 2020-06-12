<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_penjualan extends CI_Model {
	public $table = 'penjualan';
	public $id = 'id';
    public $order = 'DESC';

	public function lihat(){
		return $this->db->get($this->table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function lihat_no_penjualan($no_penjualan){
		return $this->db->get_where($this->table, ['no_penjualan' => $no_penjualan])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->table, $data);
	}

	public function hapus($no_penjualan){
		return $this->db->delete($this->table, ['no_penjualan' => $no_penjualan]);
	}
	function bayaran($bayaran, $no_penjualan)
    {
        $hasil = $this->db->query("UPDATE penjualan set acc = '$bayaran', where no_penjualan = $no_penjualan");
        return $hasil;
    }
}