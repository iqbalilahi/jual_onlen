<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_detail_penjualan extends CI_Model {
	public $table = 'detail_penjualan';
	public $id = 'id';
    public $order = 'DESC';

	public function tambah($data){
		return $this->db->insert_batch($this->table, $data);
	}

	public function lihat_no_penjualan($no_penjualan){
		return $this->db->get_where($this->table, ['no_penjualan' => $no_penjualan])->result();
	}

	public function hapus($no_penjualan){
		return $this->db->delete($this->table, ['no_penjualan' => $no_penjualan]);
	}
}