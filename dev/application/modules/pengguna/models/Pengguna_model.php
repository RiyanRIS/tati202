<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends MY_Model {
    protected $_table_name 		= 'user';
	protected $_primary_key 	= 'id_user';

    function isAlreadyTaken($username, $id = false){
        $data = $this->db->query("SELECT * FROM `user` WHERE `username` = '$username'")->result();

        if(count($data) >= 1){
            if($id){
                if($data[0]->id_user == $id){
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }

        
    }

}