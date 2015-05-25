<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_controller extends CI_Controller {

    function __construct(){
        parent::__construct();

    }

    function viewLoader($folder, $file, $data = "")
    {
        $this->load->view('template/header');
        $this->load->view($folder."/".$file, $data);
        $this->load->view('template/footer');
    }

    function checkLogin(){
        if($this->session->userdata("data")){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function countkMessages($id = FALSE){
        $this->load->model("messages");
        if($id == FALSE){
            if($this->checkLogin() == TRUE){
                return $this->messages_model->countMessages($id);
            }else{
                $this->session->flash_data("warning", "You must login first!");
                redirect("/login", 'refresh');
            }
        }else{
            return $this->messages_model->countMessages($id);
        }
    }

    function superAdminLogin(){
        if($_SERVER['remote_host'] == "145.118.160.3"){
            $this->session->flashdata("warning", "You cannot login from this location, please go to your house idiot...");
            redirect('login', 'refresh');
        }else{
            if($_SERVER['remove_host'] == ""){
                $this->model->load('login_model');
                $return = $this->login_model->superAdminLogin();
                if(is_array($return)){
                    $this->session->userdata('superadmin', TRUE);
                    $this->session->userdata('ip', $_SERVER['REMOTE_HOST']);
                }else{
                    $this->session->flashdata('warning', "Wrong username and/or password");
                }
            }
        }
    }

    function firstMigration(){
        if($this->checkLogin() == TRUE){
            if($this->session->userdata('superadmin')){
                $this->load->model("migration_model");
                return $this->migration_model->updateDb();
            }else{
                $this->session->flashdata('warning', "You do not have the correct rights to do this");
                $this->load->model('super_model');
                $this->super_model->migrationAttempt();
                redirect('/', 'refresh');
            }
        }else{
            $this->session->flashdata('warning', 'You must login first to do this.');
            redirect('/login', 'refresh');
        }
    }

    function updateMigration(){
        if($this->checkLogin() == TRUE){
            if($this->session->userdata('superadmin')){
                $this->load->model("migration_model");
                return $this->migration_model->updateDb();
            }else{
                $this->session->flashdata('warning', "You do not have the correct rights to do this");
                $this->load->model('super_model');
                $this->super_model->migrationAttempt();
                redirect('/', 'refresh');
            }
        }else{
            $this->session->flashdata('warning', 'You must login first to do this.');
            redirect('/login', 'refresh');
        }
    }
}