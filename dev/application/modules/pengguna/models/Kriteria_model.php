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

	function getKriteriaOnNilai($kode_kriteria){
		$data = $this->db->select('*')
						->from('nilai')
						->where('nilai.kode_kriteria', $kode_kriteria)
						->get()
						->result();
		return count($data);
	}

	
}
