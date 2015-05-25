<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_model {

    function __construct(){
        parent::__construct();

    }

    function addAdmin(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $this->db->insert('admin', $data);
    }
}