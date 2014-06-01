<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConfigProjectEmailController extends CI_Controller {

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
        $key = $issueID = $this->input->get('pId');
        $results = $this->getProjectDetails($key);
        foreach ($results->result_array() as $row) {
            $getEmail = "{$row['projectEmail']}";
        }
        $data['mailCon']=0;
        $data['getEmail'] = $getEmail;
        $data['projID'] = $key;
        $this->load->view('ci_simplicity/ConfigProjectEmail', $data);
    }

    public function getProjectDetails($key) {
        //$key = 'COJ';
        $this->load->model('dbModel');
        $result = $this->dbModel->getFullProjectDetails($key);
        return $result;
    }

    public function updateEmail() {
            $getEmail ='';
        if (isset($_POST['confirm'])) {
            $emailStr = $_POST['email'];
            if (filter_var($emailStr, FILTER_VALIDATE_EMAIL)) {
                $pID = $_POST['project'];
                $this->load->model('dbModel');
                $this->dbModel->updateProjectEmail($emailStr, $pID);
                $data['mailCon']=0;
                redirect('ProjectFundAllocationController?pID=' . $pID);
            } else {
                $pID = $_POST['project'];
                $results = $this->getProjectDetails($pID);
                foreach ($results->result_array() as $row) {
                    $getEmail = "{$row['projectEmail']}";
                }                 
                $data['mailCon']=1;
                $data['getEmail'] = $getEmail;
                $data['addedMail']= $_POST['email'];
                $data['projID'] = $pID;
                $this->load->view('ci_simplicity/ConfigProjectEmail', $data);
            }
        }
    }

}
