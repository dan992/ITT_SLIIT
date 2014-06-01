<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AddVirsionController extends CI_Controller {

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
        $user = $this->session->userdata("uID");
        $pid = $this->input->get('pID');
        $data['project'] = $this->getProject($pid);
        $data['projectID'] = $pid;

        //  $data['projects']=  $this->getScrumMastersProjects($user);

        $this->load->view('ci_simplicity/addVirsion', $data);
    }

    public function getUserListToArray() {
        $this->load->model('dbModel');
        $result = $this->dbModel->getUsersList();
        return $result;
    }

    public function getScrumMastersProjects($user) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->findScrumMastersProjects('Dan');
        return $projects;
    }

    public function updateIssue() {
        

        if (isset($_POST['add'])) {
            $project = $_POST['project1'];
            $virsion = $_POST['virsion'];
            $des = $_POST['description'];
            $this->load->model('dbModel');
            $this->dbModel->createVersion($project, $virsion, $des);
            redirect('BackLogController?issueIdR='.$project);
            
        }
        else {
        redirect('BackLogController?issueIdR='.$project);
    }
    }

    public function getProject($pid) {
        $this->load->model('dbModel');
        return $this->dbModel->getProjectNameByID($pid);
    }

}
