<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends MY_Model
{

	protected $_table_name 		= 'nilai';
	protected $_primary_key 	= 'kode_nilai';

    public function nilai_by_siswa()
    {
        return $this->db->query('SELECT * FROM nilai n JOIN siswa s ON n.nis = s.nis JOIN kelas k ON s.kode_kelas = k.kode_kelas GROUP BY n.nis')->result();
    }

}
