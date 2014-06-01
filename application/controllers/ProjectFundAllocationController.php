<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProjectFundAllocationController extends CI_Controller {

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
        $key = $issueID = $this->input->get('pID');
        //$key='ATD';
        $data['proID'] = $key;
        $data['results'] = $this->getProjectDetails($key);
        $this->load->view('ci_simplicity/ProjectFundAllocation', $data);
    }

    public function getProjectDetails($key) {
        //$key='COJ';
        $this->load->model('dbModel');
        $result = $this->dbModel->getFullProjectDetails($key);
        return $result;
    }

}

