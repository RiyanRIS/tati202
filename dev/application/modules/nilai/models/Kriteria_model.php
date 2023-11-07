<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends MY_Model
{

	protected $_table_name 		= 'kriteria';
	protected $_primary_key 	= 'kode_kriteria';
	// protected $_order_by 		= 'tgl_created_anggota';
	// protected $_order_by_type 	= 'desc';

	function hasKodeKriteria($kode_kriteria, $kode_kriteria_lama = 0):bool
	{
		if ($kode_kriteria_lama == 0) {
			$data_kriteria = $this->db->where($this->_primary_key, $kode_kriteria)->get($this->_table_name)->result();
			return (count($data_kriteria) >= 1 ? true : false);
		}
	}

	function getTotalSubkriteria($kode_kriteria){
		$data = $this->db->select('*')
						->from('subkriteria')
						->where('subkriteria.kode_kriteria', $kode_kriteria)
						->get()
						->result();
		return count($data);
	}

	function get_kriteria_by_nis($nis){
		$data = $this->db->query('SELECT * FROM kriteria
		WHERE kode_kriteria NOT IN (
			SELECT kode_kriteria FROM nilai WHERE nis = ' .$nis. '
		)')->result();
		return $data;
	}

	function get_siswa_by_kelas($kode_kelas){
		$data = $this->db->query("SELECT * FROM siswa
		WHERE kode_kelas = '" . $kode_kelas . "'")->result();
		return $data;
	}

	
}
