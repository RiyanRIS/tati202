<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['user_model']);
	}

	function login()
	{
		$this->load->view('login');
	}

	function tes()
	{
		print_r($this->session->userdata());
	}

	function action($param)
	{
		$msg = array(
			'status' => false,
			'kode_status' => 201,
			'message' => "Kombinasi username dan password belum sesuai."
		);

		if ($this->input->is_ajax_request()) {
			$post = $this->input->post(null, true);
			if ($param == 'login') {
				$username 	= antiSqli($post['username']);
				$password 	= antiSqli($post['password']);

				if (!empty($username) and !empty($password)) {
					$user = $this->user_model->get_by(['username' => $username]);
					if ($user) {
						if (password_verify($password, $user[0]->password)) {
							$this->session->set_userdata((array)$user[0]);
							$this->session->set_userdata('logged_in', 1);
							$this->session->set_flashdata('success', "Selamat datang, " . $username);

							$msg = array(
								'status' => true,
								'kode_status' => 200,
								'message' => "Berhasil!",
								'url' => site_url('home')
							);
						}
					}
				} else {
					$msg['message'] = "Username dan password kosong.";
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

	function logout()
	{

		$data = [
			'id_user',
			'username',
			'role',
			'logged_in',
		];
		$this->session->unset_userdata($data);

		$this->session->set_flashdata('success', 'Berhasil Logout');
		redirect(site_url('login'), 'refresh');
	}
}
