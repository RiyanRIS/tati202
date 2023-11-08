<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kriteria_model']);
		if($this->session->userdata()['role'] != 'admin'){
			$this->session->set_flashdata('error', "Maaf, Anda tidak berhak mengakses halaman ini.");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function index()
	{
		$data = array(
			'title' => "Data Kriteria",
			"kriteria" => $this->kriteria_model->get()
		);
		$this->load->view('kriteria', $data);
	}

	function aksi($id = false)
	{
		if ($id) {
			$data = array(
				'title' => "Ubah Kriteria",
				"kriteria" => $this->kriteria_model->get($id),
				"is_update" => 1,
			);
		} else {
			$data = array(
				'title' => "Tambah Kriteria",
				"kriteria" => false,
				"is_update" => 0
			);
		}
		$this->load->view('aksi', $data);
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

				$is_empty[] = !empty($post['kode_kriteria']) ? 0 : 1;
				$is_empty[] = !empty($post['nama_kriteria']) ? 0 : 1;
				$is_empty[] = !empty($post['sifat']) ? 0 : 1;
				$is_empty[] = !empty($post['bobot']) ? 0 : 1;

				$empty_notif = array(
					'kode_kriteria',
					'nama_kriteria',
					'sifat',
					'bobot',
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
						$kode_kriteria 	= $post['kode_kriteria'];
						unset($post['kode_kriteria']);
						if ($this->kriteria_model->update($post, ['kode_kriteria' => $kode_kriteria])) {
							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil mengubah data kriteria.",
								'url' => site_url('kriteria')
							);
						} else {
							$msg['message'] = 'Terjadi kesalahan pada proses update.';
						}
					} else {
						if (!$this->kriteria_model->hasKodeKriteria($post['kode_kriteria'])) {
							if ($this->kriteria_model->insert($post)) {
								$this->session->set_flashdata('success', "Berhasil menambah data kriteria.");
								$msg = array(
									'status' => true,
									'kode_status' => 200,
									'message' => "Berhasil menambah data kriteria.",
									'url' => site_url('kriteria')
								);
							} else {
								$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
							}
						} else {
							$msg['err_form'] = ['kode_kriteria'];
							$msg['message'] = 'Kode Kriteria sudah digunakan.';
						}
					}
				} else {
					$msg['err_form'] = $filtered_empty_field;
					$msg['message'] = 'Data belum lengkap. Silakan isi ' . $empty_field . '.';
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

	function hapus($kode_kriteria)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			$isValid = 1;
			if ($this->kriteria_model->getTotalSubkriteria($kode_kriteria) != 0) {
				$msg['message'] = 'Tidak dapat mengapus, data kriteria ini sedang digunakan oleh subkriteria. Kosongkan subkriteria pada kriteria untuk menghapus kriteria ini.';
				$isValid = 0;
			}

			if ($this->kriteria_model->getKriteriaOnNilai($kode_kriteria) != 0) {
				$msg['message'] = 'Tidak dapat mengapus, data kriteria ini sedang digunakan untuk penilaian.';
				$isValid = 0;
			}

			if ($isValid) {
				if ($this->kriteria_model->delete($kode_kriteria)) {
					$msg = array(
						'status' => true,
						'kode_status' => 200,
						'message' => "Berhasil menghapus data kriteria.",
						'url' => site_url('kriteria')
					);
				} else {
					$msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
				}
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();

		// redirect(site_url('kriteria'));
	}
}
