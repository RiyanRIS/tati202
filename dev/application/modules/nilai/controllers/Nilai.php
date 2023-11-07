<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kriteria_model', 'subkriteria_model', 'siswa_model', 'nilai_model', 'kelas_model']);
	}

	function index()
	{
		$data = array(
			'title' => "Alternatif Nilai Siswa",
			"nilai" => $this->nilai_model->get(),
			"kriteria" => $this->kriteria_model->get(),
			"kelas" => $this->kelas_model->get(),
				"siswa" => $this->siswa_model->get(),
				"is_update" => 0
		);
		$this->load->view('view_nilai', $data);
	}

	function tes($nis){
		$kriteria = $this->kriteria_model->get_kriteria_by_nis($nis);
		echo  "<pre>"; print_r($kriteria);
	}

	function api($param, $param2 = null)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			$post = $this->input->post(null, true);
			if ($param == 'ubah') {
				$is_update 	= $post['is_update'];
				unset($post['is_update']);

				$is_empty[] = !empty($post['nis']) ? 0 : 1;
				$is_empty[] = !empty($post['kode_kriteria']) ? 0 : 1;
				$is_empty[] = !empty($post['nilai']) ? 0 : 1;

				$empty_notif = array(
					'nis',
					'kode_kriteria',
					'nilai',
				);

				$empty = array_keys($is_empty, 1);
				$empty_field = '';
				$filtered_empty_field = array();
				foreach ($empty as $ekey => $eval) {
					$filtered_empty_field[] = $empty_notif[$eval];
				}
				$empty_field = implode(", ", $filtered_empty_field);
				$number_of_empty_field = array_sum($is_empty);

				if ($number_of_empty_field == 0) {

					if ($is_update == "1") {
						$kode_subkriteria 	= $post['kode_subkriteria'];
						unset($post['kode_subkriteria']);
						if ($this->subkriteria_model->update($post, ['kode_subkriteria' => $kode_subkriteria])) {
							$this->session->set_flashdata('success', "Berhasil mengubah data subkriteria.");
							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil mengubah data subkriteria.",
								'url' => site_url('subkriteria')
							);
						} else {
							$msg['message'] = 'Terjadi kesalahan pada proses update.';
						}
					} else {
						if ($this->nilai_model->insert($post)) {
							// if (1) {
							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil menambah data alternatif nilai.",
								'url' => site_url('nilai')
							);
						} else {
							$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
						}
					}
				} else {
					$msg['err_form'] = $filtered_empty_field;
					$msg['message'] = 'Data belum lengkap. Silakan isi ' . $empty_field . '.';
				}
			} else if($param == 'get_subkriteria') {
				$subkriteria = $this->subkriteria_model->get_join_kriteria($post['kode_kriteria']);
				$msg['data'] = $subkriteria;
				$msg['status'] = true;
				$msg['kode_status'] = 200;
				$msg['message'] = "Berhasil!";
			} else if($param == 'get_kriteria_by_nis') {
				$kriteria = $this->kriteria_model->get_kriteria_by_nis($post['nis']);
				$msg['data'] = $kriteria;
				$msg['status'] = true;
				$msg['kode_status'] = 200;
				$msg['message'] = "Berhasil!";
			} else if($param == 'get_siswa_by_kelas') {
				$kriteria = $this->kriteria_model->get_siswa_by_kelas($post['kode_kelas']);
				$msg['data'] = $kriteria;
				$msg['status'] = true;
				$msg['kode_status'] = 200;
				$msg['message'] = "Berhasil!";
			} else if($param == 'get_nilai_siswa'){
				if (!empty($post['nis'])) {
					$nis = $post['nis'];

					// Panggil model untuk mengambil nilai siswa berdasarkan NIS dan Kriteria
					$nilai_siswa = $this->nilai_model->get_nilai_siswa($nis);

					if (!empty($nilai_siswa)) {
							$msg['data'] = $nilai_siswa;
							$msg['status'] = true;
							$msg['kode_status'] = 200;
							$msg['message'] = "Berhasil!";
					} else {
							$msg['message'] = "Data nilai siswa tidak ditemukan.";
					}
			} else {
					$msg['message'] = "NIS harus disertakan dalam permintaan.";
			}
			} else {
				$msg['message'] = "Halaman tidak ditemukan";
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();
	}

	function hapus($kode_nilai)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			if ($this->nilai_model->delete($kode_nilai)) {
				$msg = array(
					'status' => true,
					'kode_status' => 200,
					'message' => "Berhasil menghapus data nilai.",
					'url' => site_url('nilai')
				);
			} else {
				$msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();
	}
}
