<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends MY_Model
{

	protected $_table_name 		= 'nilai';
	protected $_primary_key 	= 'kode_nilai';

	public function get_nilai_siswa($nis)
    {
        // Misalnya, Anda memiliki kolom dalam tabel "nilai" yang sesuai dengan NIS dan kode kriteria.
        // Anda dapat mengganti "kolom_nis" dan "kolom_kode_kriteria" dengan nama kolom yang sesuai di tabel Anda.
        $this->db->table($this->_table_name);
        $this->db->where($this->_table_name . '.nis', $nis);
        $this->db->join('siswa', 'siswa.nis = ' . $this->_table_name . ".nis");
        $query = $this->db->get();

        // Periksa apakah query berhasil dan hasil ditemukan
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        }

        // Jika tidak ada hasil yang ditemukan, Anda dapat mengembalikan nilai null atau array kosong sesuai kebutuhan Anda.
        return null;
    }

}
