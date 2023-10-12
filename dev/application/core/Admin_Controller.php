<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie', 'text'));
		$this->load->library(array());
		$this->load->model(array());

		$this->fungsi->side = 'admin';
		$this->fungsi->is_logged_in();
	}

}