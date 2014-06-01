<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BackLogController extends CI_Controller {

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
        $this->load->model('dbModel');
        $user = $this->session->userdata("uID");
        $issueID = $this->input->get('issueIdR');
        // $issueID='COS';
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
        }
        $this->load->view('ci_simplicity/BackLog', $data);
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

    public function moveToUpdate($id) {
        $issueID = array('id' => $this->input->get('issueid'));

        //echo $issueID['id'];
        redirect('UpdateIssueController?issue=' . $issueID['id']);
    }

    public function moveToAddIssue($id) {

        $issueID = array('id' => $this->input->get('pID'));
        // $issueID=$_POST['usersProject'];
        // echo $issueID;
        redirect('AddIssueController?pID=' . $issueID['id']);
    }

    public function moveToAddVirsion($id) {

        $issueID = array('id' => $this->input->get('pID'));
        // $issueID=$_POST['usersProject'];
        // echo $issueID;
        redirect('AddVirsionController?pID=' . $issueID['id']);
    }

    public function viewBackLog() {
        if (isset($_POST['view'])) {
            $id = $_POST['usersProject'];
            redirect('BackLogController?issueIdR=' . $id);
        }
    }

    public function deleteIssue() {
       // $issueID = array('id' => $this->input->get('issueid'));
       // $issueID2 = $this->input->get('x');
       // $array = explode('/', $issueID['id']);

        $issueID =$_POST['issueid'];
        $projectID=$_POST['projectID'];
        $this->load->model('dbModel');
        $this->dbModel->deleteIssue($issueID);
      //  redirect('BackLogController?issueIdR='.$projectID);
    }

}
