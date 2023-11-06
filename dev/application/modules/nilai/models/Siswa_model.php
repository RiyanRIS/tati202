<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends MY_Model
{

	protected $_table_name 		= 'siswa';
	protected $_primary_key 	= 'nis';
	// protected $_order_by 		= 'tgl_created_anggota';
	// protected $_order_by_type 	= 'desc';

	function hasNis($nis, $kode_kelas_lama = 0): bool
	{
		if ($kode_kelas_lama == 0) {
			$data = $this->db->where($this->_primary_key, $nis)->get($this->_table_name)->result();
			return (count($data) >= 1 ? true : false);
		}
	}

	function get_siswa($nis = false)
	{
		if ($nis) {
			return $this->db->select('*')
				->from('siswa')
				->where('siswa.nis', $nis)
				->join('kelas', 'kelas.kode_kelas = siswa.kode_kelas')
				->get()
				->result();
		} else {
			return $this->db->select('*')
				->from('siswa')
				->join('kelas', 'kelas.kode_kelas = siswa.kode_kelas')
				->get()
				->result();
		}
	}
}
