<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_controller extends MY_controller {

    function __construct(){
        parent::__construct();
    }

    function installDatabase()
    {
        if($this->session->userdata('loggedin') == TRUE){
            if($this->session->userdata('superuser') == TRUE){
                if($_SERVER['REMOTE_HOST'] == superIP){
                    $this->load->model('installation_model');
                    $return = $this->installation_model->installWebsite();
                    if($return == TRUE){
                         //function to remove all installation files and remain basic files
                    }
                }
            }
        }
    }
}