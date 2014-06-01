<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AddIssueController extends CI_Controller {

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
        $user =$this->session->userdata("uID");
        $pid = $this->input->get('pID');
        $data['project'] = $this->getProject($pid);
        $data['projID'] = $pid;

        $data['projects'] = $this->getScrumMastersProjects($user);
        $data['issuetypo'] = $this->returnIssueType();
        $data['issuePriority'] = $this->returnIssuePriority();
        $data['versionArray']=  $this->getVersion($pid);
        $data['results'] = $this->getUserListToArray();
        $this->load->view('ci_simplicity/addIssue', $data);
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

    public function returnIssueType() {
        $issuetypo = array();
        $issuetypo['New Feature'] = " New Feature";
        $issuetypo['Improvement'] = " Improvement";
        $issuetypo['Bug'] = "Bug";
        $issuetypo['Custom Issue'] = "Custom Issue";

        return $issuetypo;
    }

    public function returnIssuePriority() {
        $issuePriority = array();
        $issuePriority['Blocker'] = "Blocker";
        $issuePriority['Critical'] = "Critical";
        $issuePriority['Major'] = "Major";
        $issuePriority['Minor'] = "Minor";
        $issuePriority['Trivial'] = "Trivial";
        return $issuePriority;
    }

    public function addIssue() {
        $this->load->model('dbModel');


        if (isset($_POST['add'])) {
            $issueId = $_POST['issueID'];
            /* if (isset($_POST['name'])) { */
            $project = $_POST['issueID'];
            $issue = $_POST['issueType'];
            $summary = $_POST['Summary'];
            $priorty = $_POST['priority'];
            $dueDate = $_POST['duedate'];
            $components = "None";
            $affects = $_POST['affectedVirsion'];
            $des = $_POST['description'];
            $estimate = $_POST['oEstimate'];
            $remaning = $_POST['rEstimate'];
            $pro_status = 1;


            $this->dbModel->insertIssues($project, $issue, $summary, $priorty, $dueDate, $components, $affects, $des, $estimate, $remaning, $pro_status);
            redirect('BackLogController?issueIdR=' . $project);
        }
    }

    public function getProjectID($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getProjectIDAccordingToIssue($issue);
    }

    public function getProject($pid) {
        $this->load->model('dbModel');
        return $this->dbModel->getProjectNameByID($pid);
    }
    
    public function getVersion($pid){
          $this->load->model('dbModel');          
          
          return $result=$this->dbModel->getVersionIDByProjectID($pid);
          
         
    }

}
