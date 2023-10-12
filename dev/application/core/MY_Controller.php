<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    //public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','fungsi','file','security'));
        $this->load->library(array('session','form_validation','fungsi', 'template'));
        // echo "<h1>test</h1>";

        // redirect('backend/dashboard','refresh');
        
    }

}