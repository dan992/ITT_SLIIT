<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ViewSprintDetailsController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->_init();
        $this->_init();
        $this->load->library('session');
        if ($this->session->userdata('data')) {
            $this->variable = $this->session->userdata('data');
        }
        
    }

    private function _init() {
       $this->load->model('User');
        $this->output->set_template('template02');
        if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template02');
        else {
            redirect('LoginController');
        }
    }

    public function index() {
        if ((!$this->session->userdata('sNumber')) && (!$this->session->userdata('usersProject')) && ((!$this->session->userdata('ustory')))) {
            //prompt users that there is no session
            $data["sNumber"] = "No session";
            $data["usersProject"] = "No session";
            $data["ustory"] ="";
       } else {
            $usersProject = $this->session->userdata('usersProject');
            $sprintNumber = $this->session->userdata('sNumber');
            $spUserStory_=$this->session->userdata('ustory');
            $data["usersProject"] = $usersProject;
            $data["sNumber"] = $sprintNumber;
            $data["ustory"] = $spUserStory_;
       }
        
       
        
        $user = $this->session->userdata("uID");
        $issueID = $this->input->get('issueIdR');
        $data['projects'] = $this->getScrumMastersProjects($user);
        if ($issueID == '') {
            $data['projName'] = '';
            $data['projID'] = '';
        } else {
            $projectName = $this->getProjectName($issueID);
            $data['projName'] = $this->getProjectName($issueID);     
            $data['projID'] = $issueID;
        }
        $this->load->view('ci_simplicity/viewSprintDetails', $data);
    }

    public function view() {
        if (isset($_POST['view'])) {
            $id = $_POST['usersProject'];
            redirect('ViewSprintDetailsController?issueIdR=' . $id);
        }
    }
    public function getProjectName($id) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->getProjectNameByID($id);
        return $projects;
    }

    public function getScrumMastersProjects($user) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->findScrumMastersProjects($user);
        return $projects;
    }   
    
}
