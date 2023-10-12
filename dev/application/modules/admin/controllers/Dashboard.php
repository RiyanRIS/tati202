<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model(['anggota_model']);
	}

	function index()
	{
        $data = array(
            'title' => "Dashboard",
        );
		$this->load->view('dashboard', $data);
	}
}