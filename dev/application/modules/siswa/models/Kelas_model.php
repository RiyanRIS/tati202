<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends MY_Model
{

	protected $_table_name 		= 'kelas';
	protected $_primary_key 	= 'kode_kelas';
	// protected $_order_by 		= 'tgl_created_anggota';
	// protected $_order_by_type 	= 'desc';

	function hasKodeKelas($kode_kelas, $kode_kelas_lama = 0):bool
	{
		if ($kode_kelas_lama == 0) {
			$data_kelas = $this->db->where('kode_kelas', $kode_kelas)->get($this->_table_name)->result();
			return (count($data_kelas) >= 1 ? true : false);
		}
	}
}
