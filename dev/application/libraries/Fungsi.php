<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Fungsi {

	// Melog link di url agar tidak boleh masuk sembarangan
	function is_logged_in(){
		$_this =& get_instance();
		$user_session = $_this->session->userdata;
		if($this->side == 'admin'){
			if( !isset($user_session['id_user']) OR !isset($user_session['username']) OR !isset($user_session['role']) OR !isset($user_session['logged_in']) ){
				$data = [
	                        'id_user',
	                        'username',
	                        'role',
	                        'logged_in',
	                    ];
                $_this->session->unset_userdata($data);
                $_this->session->set_flashdata('danger', 'Maaf Anda Belum Login');
                redirect(site_url('login'));
			}
		}else{
			if( !isset($user_session['logged_in']) ){
				$_this->session->sess_destroy();
				$cookie = explode(";", @$_SERVER['HTTP_COOKIE']);
				foreach ($cookie as $key => $value) {
					$pecah_cookie = explode("=" , $value)[0];
					if($pecah_cookie != "ci_session"){
						set_cookie($pecah_cookie, '', time()-3600);
					}
				}
				redirect('auth');
			}
		}
	}

	// function user_data
	function RS(){
		$_this =& get_instance();
		$_this->load->model('frontend/rs_model');
		if($this->side == 'admin'){
			$fk 		= $_this->session->userdata('fk_rs');
			$user_data 	= $_this->rs_model->get_rs(['id_rs'=> $fk], null, null, true);
		}else{
			$user_data  =  $_this->rs_model->get(null, true);
		}
		return $user_data;

	}

	function CC($id){
		$_this =& get_instance();
		$_this->load->model('frontend/Call_center_model');
		$user_data 	= $_this->Call_center_model->get_by(['jangan_hapus'=> $id], null, null, true);
		return $user_data;
	}

}