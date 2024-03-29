<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kelas_model', 'siswa_model']);
		if($this->session->userdata()['role'] != 'admin'){
			$this->session->set_flashdata('error', "Maaf, Anda tidak berhak mengakses halaman ini.");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function index()
	{
		$data = array(
			'title' => "Data Siswa",
			"siswa" => $this->siswa_model->get_siswa()
		);
		$this->load->view('siswa', $data);
	}

	function aksi($id = false)
	{
		$kelas = $this->kelas_model->get();
		if(count($kelas) == 0){
			$this->session->set_flashdata('error', "Buat data kelas terlebih dahulu.");
			redirect(site_url('kelas/aksi'));
			die();
		}
		if ($id) {
			$data = array(
				'title' => "Ubah Siswa",
				"siswa" => $this->siswa_model->get($id),
				"kelas" => $kelas,
				"is_update" => 1,
			);
		} else {
			$data = array(
				'title' => "Tambah Siswa",
				"kelas" => $kelas,
				"siswa" => false,
				"is_update" => 0
			);
		}
		$this->load->view('aksi', $data);
	}

	function api($param, $param2 = null)
	{
		$file_name = time() . "_" . uniqid();
		$config['upload_path'] = './uploads/siswa/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);

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
				$is_empty[] = !empty($post['nama_siswa']) ? 0 : 1;
				$is_empty[] = !empty($post['jk_siswa']) ? 0 : 1;
				$is_empty[] = !empty($post['alamat']) ? 0 : 1;
				$is_empty[] = !empty($post['tempat_lahir']) ? 0 : 1;
				$is_empty[] = !empty($post['tanggal_lahir']) ? 0 : 1;
				$is_empty[] = !empty($post['kode_kelas']) ? 0 : 1;

				$empty_notif = array(
					'nis',
					'nama_siswa',
					'jk_siswa',
					'alamat',
					'tempat_lahir',
					'tanggal_lahir',
					'kode_kelas',
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
						$is_valid = false;
						if (!empty($_FILES['foto']['tmp_name'])) {
							if (!$this->upload->do_upload('foto')) {
								$msg['message'] = $this->upload->display_errors();
								$msg['err_form'] = ['foto'];
							} else {
								$is_valid = true;
								$post['foto'] = $this->upload->data('file_name');;
							}
						} else {
							$is_valid = true;
						}

						if ($is_valid) {
							$nis 	= $post['nis'];
							unset($post['nis']);
							if ($this->siswa_model->update($post, ['nis' => $nis])) {
								$msg = array(
									'status' => true,
									'kode_status' => 200,
									'message' => "Berhasil mengubah data siswa.",
									'url' => site_url('siswa')
								);
							} else {
								$msg['message'] = 'Terjadi kesalahan pada proses update.';
							}
						}
					} else {
						if (!$this->siswa_model->hasNis($post['nis'])) {
							if (!$this->upload->do_upload('foto')) {
								$msg['message'] = $this->upload->display_errors();
								$msg['err_form'] = ['foto'];
							} else {
								$post['foto'] = $this->upload->data('file_name');;
								if ($this->siswa_model->insert($post)) {
									$this->session->set_flashdata('success', "Berhasil menambah data siswa.");
									$msg = array(
										'status' => true,
										'kode_status' => 200,
										'message' => "Berhasil menambah data siswa.",
										'url' => site_url('siswa')
									);
								} else {
									$msg['message'] = 'Terjadi kesalahan pada proses penginputan.';
								}
							}
						} else {
							$msg['err_form'] = ['nis'];
							$msg['message'] = 'Nis sudah terdaftar.';
						}
					}
				} else {
					$msg['err_form'] = $filtered_empty_field;
					$msg['message'] = 'Data belum lengkap. Silakan isi ' . $empty_field . '.';
				}
			} else if($param == 'ambil'){
				$nis = $param2;
				$data = $this->siswa_model->get_siswa($nis);
				if(count($data) != 0){
					$html = $this->load->view('modal_detailsiswa', ['siswa' => $data[0]], true);
					$msg = array(
						'status' => true,
						'kode_status' => 200,
						'message' => "Berhasil mengambil data siswa.",
						'html' => $html,
						'url' => site_url('siswa')
					);
				} else {
					$msg['message'] = "Siswa tidak ditemukan.";
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

	function hapus($nis)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			if ($this->siswa_model->delete($nis)) {
				$msg = array(
					'status' => true,
					'kode_status' => 200,
					'message' => "Berhasil menghapus data siswa.",
					'url' => site_url('siswa')
				);
			} else {
				$msg['message'] = 'Gagal menghapus data siswa.';
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();
	}

	function hapus_foto($nis)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Data yang dikirim tidak sesuai"
		);

		if ($this->input->is_ajax_request()) {
			$data_updated = [
				'foto' => null,
			];
			if ($this->siswa_model->update($data_updated, ['nis' => $nis])) {
				$msg = array(
					'status' => true,
					'kode_status' => 200,
					'message' => "Berhasil menghapus foto siswa.",
					'url' => site_url('siswa')
				);
			} else {
				$msg['message'] = 'Gagal menghapus foto siswa.';
			}
		} else {
			$msg['message'] = "Permintaan tidak dapat diproses.";
		}

		echo json_encode($msg);
		die();
	}
}
