<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['pengguna_model']);
		if($this->session->userdata()['role'] != 'admin'){
			$this->session->set_flashdata('error', "Maaf, Anda tidak berhak mengakses halaman ini.");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function index()
	{
		$data = array(
			'title' => "Data Pengguna",
			"pengguna" => $this->pengguna_model->get()
		);
		$this->load->view('pengguna', $data);
	}

	function aksi($id = false)
	{
		if ($id) {
			$data = array(
				'title' => "Ubah Pengguna",
				"pengguna" => $this->pengguna_model->get($id),
				"is_update" => 1,
			);
		} else {
			$data = array(
				'title' => "Tambah Pengguna",
				"pengguna" => false,
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

				$is_empty[] = !empty($post['username']) ? 0 : 1;
				$is_empty[] = !empty($post['role']) ? 0 : 1;

				$empty_notif = array(
					'username',
					'role',
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
						$id_user 	= $post['id_user'];
						unset($post['id_user']);
						$isValid = 1;

						if ($this->pengguna_model->isAlreadyTaken($post['username'], $id_user)) {
							$isValid = 0;
							$msg['err_form'] = ['username'];
							$msg['message'] = 'Username telah digunakan seseorang.';
						}

						if ($post['password']) {
							if ($post['password'] != $post['confirm_password']) {
								$isValid = 0;
								$msg['err_form'] = ['password', 'confirm-password'];
								$msg['message'] = 'Konfirmasi password tidak sesuai.';
							} else {
								$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
								unset($post['confirm_password']);
							}
						} else {
							unset($post['confirm_password']);
							unset($post['password']);
						}

						if ($isValid) {
							if ($this->pengguna_model->update($post, ['id_user' => $id_user])) {
								$msg = array(
									'status' => true,
									'kode_status' => 200,
									'message' => "Berhasil mengubah data pengguna.",
									'url' => site_url('pengguna')
								);
							} else {
								$msg['message'] = 'Terjadi kesalahan pada proses update.';
							}
						}
					} else {
						$isValid = 1;

						if ($this->pengguna_model->isAlreadyTaken($post['username'])) {
							$isValid = 0;
							$msg['err_form'] = ['username'];
							$msg['message'] = 'Username telah digunakan seseorang.';
						}

						if (empty($post['password'])) {
							$isValid = 0;
							$msg['err_form'] = ['password'];
							$msg['message'] = 'Password masih kosong.';
						}

						if ($post['password'] != $post['confirm_password']) {
							$isValid = 0;
							$msg['err_form'] = ['confirm_password'];
							$msg['message'] = 'Konfirmasi password tidak sesuai.';
						}

						if ($isValid) {
							$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
							unset($post['confirm_password']);
							if ($this->pengguna_model->insert($post)) {
								$this->session->set_flashdata('success', "Berhasil menambah data pengguna.");
								$msg = array(
									'status' => true,
									'kode_status' => 200,
									'message' => "Berhasil menambah data pengguna.",
									'url' => site_url('pengguna')
								);
							} else {
								$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
							}
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
	}

	function hapus($kode_pengguna)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			$isValid = 1;

			if ($isValid) {
				if ($this->pengguna_model->delete($kode_pengguna)) {
					$msg = array(
						'status' => true,
						'kode_status' => 200,
						'message' => "Berhasil menghapus data pengguna.",
						'url' => site_url('pengguna')
					);
				} else {
					$msg['message'] = 'Terjadi kesalahan pada proses penghapusan.';
				}
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
	}
}
