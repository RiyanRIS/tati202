<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubKriteria extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['subkriteria_model', 'kriteria_model']);
	}

	function index()
	{
		$data = array(
			'title' => "Data SubKriteria",
			"subkriteria" => $this->subkriteria_model->get_join_kriteria()
		);
		$this->load->view('subkriteria', $data);
	}

	function aksi($id = false)
	{
		$kriteria = $this->kriteria_model->get();
		if(count($kriteria) == 0){
			$this->session->set_flashdata('error', "Buat data kriteria terlebih dahulu.");
			redirect(site_url('kriteria/aksi'));
			die();
		}
		if ($id) {
			$data = array(
				'title' => "Ubah SubKriteria",
				"subkriteria" => $this->subkriteria_model->get($id),
				"kriteria" => $kriteria,
				"is_update" => 1,
			);
		} else {
			$data = array(
				'title' => "Tambah SubKriteria",
				"subkriteria" => false,
				"kriteria" => $kriteria,
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
				$is_empty[] = !empty($post['nilai']) ? 0 : 1;
				$is_empty[] = !empty($post['keterangan']) ? 0 : 1;

				$empty_notif = array(
					'kode_kriteria',
					'nilai',
					'keterangan',
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
						if ($this->subkriteria_model->insert($post)) {
							$this->session->set_flashdata('success', "Berhasil menambah data subkriteria.");
							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil menambah data subkriteria.",
								'url' => site_url('subkriteria')
							);
						} else {
							$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
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

	function hapus($kode_subkriteria)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			if ($this->subkriteria_model->delete($kode_subkriteria)) {
				$msg = array(
					'status' => true,
					'kode_status' => 200,
					'message' => "Berhasil menghapus data subkriteria.",
					'url' => site_url('subkriteria')
				);
			} else {
				$msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();

		// redirect(site_url('subkriteria'));
	}
}
