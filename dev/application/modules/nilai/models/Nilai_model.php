<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends MY_Model
{

	protected $_table_name 		= 'nilai';
	protected $_primary_key 	= 'kode_nilai';

	public function get_nilai_siswa($nis)
    {
        $this->db->select("*");
        $this->db->from($this->_table_name);
        $this->db->where($this->_table_name . '.nis', $nis);
        $this->db->join('siswa', 'siswa.nis = ' . $this->_table_name . ".nis");
        $this->db->join('kriteria', 'kriteria.kode_kriteria = ' . $this->_table_name . ".kode_kriteria");
        $query = $this->db->get();

        // Periksa apakah query berhasil dan hasil ditemukan
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        }

        // Jika tidak ada hasil yang ditemukan, Anda dapat mengembalikan nilai null atau array kosong sesuai kebutuhan Anda.
        return null;
    }

    public function get_nilai()
    {
        $this->db->select("*");
        $this->db->from($this->_table_name);
        $this->db->join('siswa', 'siswa.nis = ' . $this->_table_name . ".nis");
        $this->db->join('kelas', 'siswa.kode_kelas = kelas.kode_kelas');
        $this->db->join('kriteria', 'kriteria.kode_kriteria = ' . $this->_table_name . ".kode_kriteria");
        $this->db->order_by('siswa.nama_siswa', 'ASC');
        $query = $this->db->get();

        // Periksa apakah query berhasil dan hasil ditemukan
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        }

        // Jika tidak ada hasil yang ditemukan, Anda dapat mengembalikan nilai null atau array kosong sesuai kebutuhan Anda.
        return [];
    }

    public function delete_all(){
        return $this->db->query('DELETE FROM ' . $this->_table_name);
    }

}
