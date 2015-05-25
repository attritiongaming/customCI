<?php

class Migrate extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {

        $this->migration->version(002);
        #$this->migration->current();
    }

}