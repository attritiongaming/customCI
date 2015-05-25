<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class install_controller extends MY_controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $data = "";
        $this->load->view("installation/index");
    }

    function addAdmin(){
        $data = "";
        $config = array(
            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'required|unique'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == TRUE){
            $this->load->model('user_model');
            $return = $this->user_model->setAdmin();

            if($return == TRUE){
                $this->session->flash_data('success_registration', 'Admin account is successfully installed');
            }else{
                $this->session->flash_data('error_registration', 'Admin account is not successfully installed');
            }
        }else{
            $this->viewLoader("installation", "index", $data);
        }
    }
}