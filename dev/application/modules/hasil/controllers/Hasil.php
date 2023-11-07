<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['nilai_model', 'kriteria_model']);
	}

	

	function index()
	{
		$nis = '990142555462';
		$data = array(
			'title' => "Hasil Perhitungan",
			"nilai_by_siswa" => $this->nilai_model->nilai_by_siswa(),
			"kriteria" => $this->kriteria_model->get(),
		);

		// echo "<pre>";print_r($data); die();
		$this->load->view('hasil', $data);
	}
	
}
