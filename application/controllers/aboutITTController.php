<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AboutITTController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->_init();
    }

    private function _init() {
       $this->load->model('User');
        if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template02');
        else {
            redirect('LoginController');
        }
       
    }

    public function index() {

        $this->load->view('ci_simplicity/aboutITT');
    }

}
