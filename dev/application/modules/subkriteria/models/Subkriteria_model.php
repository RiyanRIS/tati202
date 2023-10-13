<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria_model extends MY_Model
{

	protected $_table_name 		= 'subkriteria';
	protected $_primary_key 	= 'kode_subkriteria';
	// protected $_order_by 		= 'tgl_created_anggota';
	// protected $_order_by_type 	= 'desc';

	function get_join_kriteria($kode_kriteria = false)
	{
		if ($kode_kriteria) {
			return $this->db->select('*')
				->from('subkriteria')
				->where('kriteria.kode_kriteria', $kode_kriteria)
				->join('kriteria', 'kriteria.kode_kriteria = subkriteria.kode_kriteria')
				->get()
				->result();
		} else {
			return $this->db->select('*')
				->from('subkriteria')
				->join('kriteria', 'kriteria.kode_kriteria = subkriteria.kode_kriteria')
				->get()
				->result();
		}
	}

}
