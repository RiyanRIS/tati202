<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kelas_model']);
	}

	function index()
	{
		$data = array(
			'title' => "Data Kelas",
			"kelas" => $this->kelas_model->get()
		);
		$this->load->view('kelas', $data);
	}

	function aksi($id = false)
	{
		if ($id) {
			$data = array(
				'title' => "Ubah Kelas",
				"kelas" => $this->kelas_model->get($id),
				"is_update" => 1,
			);
		} else {
			$data = array(
				'title' => "Tambah Kelas",
				"kelas" => false,
				"is_update" => 0
			);
		}
		$this->load->view('aksi', $data);
	}

	function tes()
	{
		$data = $this->kelas_model->get_siswa_by_kelas('KLS001');
		print_r($data);
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

				$is_empty[] = !empty($post['kode_kelas']) ? 0 : 1;
				$is_empty[] = !empty($post['nama_kelas']) ? 0 : 1;

				$empty_notif = array(
					'kode_kelas',
					'nama_kelas',
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
						$kode_kelas 	= $post['kode_kelas'];
						unset($post['kode_kelas']);
						if ($this->kelas_model->update($post, ['kode_kelas' => $kode_kelas])) {
							$this->session->set_flashdata('success', "Berhasil mengubah data kelas.");
							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil mengubah data kelas.",
								'url' => site_url('kelas')
							);
						} else {
							$msg['message'] = 'Terjadi kesalahan pada proses update.';
						}
					} else {
						if (!$this->kelas_model->hasKodeKelas($post['kode_kelas'])) {
							if ($this->kelas_model->insert($post)) {
								$this->session->set_flashdata('success', "Berhasil menambah data kelas.");
								$msg = array(
									'status' => true,
									'kode_status' => 200,
									'message' => "Berhasil menambah data kelas.",
									'url' => site_url('kelas')
								);
							} else {
								$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
							}
						} else {
							$msg['err_form'] = ['kode_kelas'];
							$msg['message'] = 'Kode Kelas sudah tersedia.';
						}
					}
				} else {
					$msg['err_form'] = $filtered_empty_field;
					$msg['message'] = 'Data belum lengkap. Silakan isi ' . $empty_field . '.';
				}
			} else if ($param == 'ambil_siswa') {
				$kode_kelas = $param2;
				$data = $this->kelas_model->get_siswa_by_kelas($kode_kelas);
				$kelas = $this->kelas_model->get($kode_kelas);
				$html = $this->load->view('modal_viewsiswa', ['siswa' => $data], true);
				$msg = array(
					'status' => true,
					'kode_status' => 200,
					'message' => "Berhasil mengambil data siswa " . $kelas[0]->nama_kelas . ".",
					'html' => $html,
					'title' => "Data Siswa " . $kelas[0]->nama_kelas,
					'url' => site_url('siswa')
				);
			} else {
				$msg['message'] = "Halaman tidak ditemukan";
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();
	}

	function hapus($kode_kelas)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			if ($this->kelas_model->getTotalSiswa($kode_kelas) == 0) {
				if ($this->kelas_model->delete($kode_kelas)) {
					$msg = array(
						'status' => true,
						'kode_status' => 200,
						'message' => "Berhasil menghapus data kelas.",
						'url' => site_url('kelas')
					);
				} else {
					$msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
				}
			} else {
				$msg['message'] = 'Tidak dapat mengapus, data kelas ini sedang digunakan oleh siswa. Kosongkan siswa pada kelas untuk menghapus kelas ini.';
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();

		// redirect(site_url('kelas'));
	}
}
