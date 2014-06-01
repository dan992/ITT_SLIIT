<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SprintController extends CI_Controller {

    public $var = "";

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->_init();
        if ($this->session->userdata('data')) {
            $this->vdata = $this->session->userdata('vdata');
        }
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
        $id = '';
        $user =$this->session->userdata("uID");
        $issueID = $this->input->get('issueIdR');
        $data['projects'] = $this->getScrumMastersProjects($user);
        if ($issueID == '') {

            $data['projName'] = '';
            $data['projID'] = '';
            $data['doneID'] = array();
            $data['doneList'] = array();
            $data['inProcessID'] = array();
            $data['inProcessList'] = array();
            $data['inTestingID'] = array();
            $data['inTestingList'] = array();
            $data['toDOarrayID'] = array();
            $data['toDOarrayList'] = array();
            $data['issuetypo'] = array();
            $data['issuePriority'] = array();
            $data['sProjectName'] = '';
            $data['sprint_number'] = '';
        } else {
            $data['projName'] = $this->getProjectName($issueID);
            $data['projID'] = $issueID;
            $data['doneID'] = $this->getIssuesDoneID($issueID);
            $data['doneList'] = $this->getIssuesDoneDO($issueID);
            $data['inProcessID'] = $this->getIssuesInProcessID($issueID);
            $data['inProcessList'] = $this->getIssuesInProcess($issueID);
            $data['inTestingID'] = $this->getIssuesInTestingID($issueID);
            $data['inTestingList'] = $this->getIssuesInTesting($issueID);
            $data['toDOarrayID'] = $this->getIssuesToDOID($issueID);
            $data['toDOarrayList'] = $this->getIssuesToDO($issueID);
            $data['issuetypo'] = $this->returnIssueType();
            $data['issuePriority'] = $this->returnIssuePriority();

            $this->load->model('dbModel');
            $sprint_number = $this->dbModel->sprintNumber($this->getProjectName($issueID));
            $data['sprint_number'] = $sprint_number;
            $this->session->set_userdata('sprint_number', $sprint_number);
            $project_name = $this->getProjectName($issueID);
            $data['sProjectName'] = $this->getProjectName($issueID);
            $this->session->set_userdata('project_name', $project_name);

            $this->vdata['pName'] = $sprint_number;
            $this->vdata['spNumb'] = $this->getProjectName($issueID);
            $this->session->set_userdata('vdata', $this->vdata);
        }
        $this->load->view('ci_simplicity/Sprint', $data);
    }

    public function getUserListToArray() {
        $this->load->model('dbModel');
        $result = $this->dbModel->getUsersList();
        return $result;
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

    public function getIssuesToDOID($is) {
        $this->load->model('dbModel');
        $query = $this->dbModel->getToDoList($is);

        return $query;
    }

    public function getIssuesToDO($is) {
        $toDOarrayList = array();
        $this->load->model('dbModel');
        $toDoId = $this->getIssuesToDOID($is);


        for ($i = 0; $i < sizeof($toDoId); $i++) {
            $toDOarrayList[] = $this->dbModel->getIssuesAccordingToId($toDoId[$i]);
        }

        return $toDOarrayList;
    }

    public function getSelectedProject() {
        if (isset($_POST['view'])) {
            $proN = $_POST['usersProject'];
        }
        return $proN;
    }

    public function getSelectedSprintNO() {
        if (isset($_POST['view'])) {
            $proN = $_POST['sNumber'];
        }
        return $proN;
    }

    public function getIssuesInProcessID($is) {
        $this->load->model('dbModel');
        $query = $this->dbModel->getInProcessList($is);
        return $query;
    }

    public function getIssuesInProcess($is) {
        $inProcessList = array();
        $this->load->model('dbModel');
        $inProcess = $this->getIssuesInProcessID($is);

        for ($i = 0; $i < sizeof($inProcess); $i++) {
            $inProcessList[] = $this->dbModel->getIssuesAccordingToId($inProcess[$i]);

            //echo $db->getIssuesAccordingToId($toDOarrayID[$i]);
        }
        return $inProcessList;
    }

    public function getIssuesInTestingID($is) {
        $this->load->model('dbModel');
        $query = $this->dbModel->inTestingList($is);
        return $query;
    }

    public function getIssuesInTesting($is) {
        $inTestingList = array();
        $this->load->model('dbModel');
        $inTesting = $this->getIssuesInTestingID($is);

        for ($i = 0; $i < sizeof($inTesting); $i++) {
            $inTestingList[] = $this->dbModel->getIssuesAccordingToId($inTesting[$i]);
        }
        return $inTestingList;
    }

    public function getIssuesDoneID($is) {
        $this->load->model('dbModel');
        $query = $this->dbModel->getDoneList($is);
        return $query;
    }

    public function getIssuesDoneDO($is) {
        $doneList = array();
        $this->load->model('dbModel');
        $doneID = $this->getIssuesDoneID($is);

        for ($i = 0; $i < sizeof($doneID); $i++) {
            $doneList[] = $this->dbModel->getIssuesAccordingToId($doneID[$i]);
        }
        return $doneList;
    }

    public function getScrumMastersProjects($user) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->findScrumMastersProjects($user); // hv to use session user
        return $projects;
    }

    public function getProjectName($id) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->getProjectNameByID($id);
        return $projects;
    }

    public function viewBackLog() {
        if (isset($_POST['view'])) {
            $id = $_POST['usersProject'];
            $this->session->set_userdata('usersProject', $id);
            redirect('SprintController?issueIdR=' . $id);
            //die();
        } elseif (isset($_POST['createSprint'])) {
            $this->moveToCreateSprint();
        } elseif (isset($_POST['test'])) {
            echo $this->variable;
        }
    }

    public function moveToCreateSprint() {
        if (isset($_POST['createSprint'])) {
            $sprintNumber = mysql_real_escape_string($_POST['sNumber']);
            $this->session->set_userdata('sNumber', $sprintNumber);
            for($i=0;$i<1000000;$i++);
            redirect('createSprintController');
        }
    }

    public function updateSession_() {
        //$this->index();
        // $issueID=$this->input->get('issueIdR');           
        //$usersProject = $this->session->userdata('sprint_number'); 
        //$sprintNumber = $this->session-userdata('project_name');
        // $usersProject = "COS";
        //$sprintNumber = 2;
        $array = $_POST['array1'];
        $usersProject = $_POST['projectID'];
        $sprintNumber = $_POST['sprint_number'];
        $arraySplitBySlash = explode("|", $array);
        $arraByComma1 = explode(",", $arraySplitBySlash[2]);
        $arraByComma2 = explode(",", $arraySplitBySlash[3]);

        $compleateArray = array_merge($arraByComma1, $arraByComma2);

        // die();
        for ($x = 0; $x < sizeof($compleateArray); $x++) {
            $this->load->model('dbModel');
            $this->dbModel->insertIntoSprint($compleateArray[$x], $usersProject, $sprintNumber);
        }
    }

}
