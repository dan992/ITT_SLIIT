<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UpdateIssueController extends CI_Controller {

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
        $issue = $this->input->get('issue');
        $data['versionArray'] = $this->getVersion($this->getProjectID($issue));
        $data['project'] = $this->getProject($issue);
        $data['projectID'] = $this->getProjectID($issue);
        $data['issue'] = $issue;
        $data['issuesAccordingToId'] = $this->getIssuesAccordingToId($issue);
        $data['priorty'] = $this->getPriorty($issue);
        $data['issueType'] = $this->getIssueType($issue);
        $data['dueDate'] = $this->getDueDate($issue);
        $data['component'] = $this->getComponent($issue);
        $data['des'] = $this->getDescription($issue);
        $data['originalEstimate'] = $this->getOriginalEstimate($issue);
        $data['remaningEstimate'] = $this->getRemaningEstimate($issue);
        $data['affectVir'] = $this->getAffectVir($issue);
        $data['projects'] = $this->getScrumMastersProjects($user);
        $data['issuetypo'] = $this->returnIssueType();
        $data['issuePriority'] = $this->returnIssuePriority();
        $data['results'] = $this->getUserListToArray();
        $this->load->view('ci_simplicity/updateIssue', $data);
    }

    public function getUserListToArray() {
        $this->load->model('dbModel');
        $result = $this->dbModel->getUsersList();
        return $result;
    }

    public function getScrumMastersProjects($user) {
        $this->load->model('dbModel');
        $projects = $this->dbModel->findScrumMastersProjects($user);
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

    public function updateIssue() {
        $this->load->model('dbModel');


        if (isset($_POST['Update'])) {
            $issueId = $_POST['issueID'];
            /* if (isset($_POST['name'])) { */
            $project = $_POST['project'];
            $issue = $_POST['issueType'];
            $summary = $_POST['Summary'];
            $priorty = $_POST['priority'];
            $dueDate = $_POST['duedate'];
            $components = "None";
            $affects = $_POST['affectedVirsion'];
            $des = $_POST['description'];
            $estimate = $_POST['oEstimate'];
            $remaning = $_POST['rEstimate'];



            $this->dbModel->udateIssues($issueId, $project, $issue, $summary, $priorty, $dueDate, $components, $affects, $des, $estimate, $remaning);
            redirect('BackLogController?issueIdR=' . $project);
        }
    }

    public function getIssuesAccordingToId($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getIssuesAccordingToId($issue);
    }

    public function getPriorty($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getPriorty($issue);
    }

    public function getDueDate($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getDueDate($issue);
    }

    public function getComponent($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getComponent($issue);
    }

    public function getDescription($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getDescription($issue);
    }

    public function getOriginalEstimate($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getOriginalEstimate($issue);
    }

    public function getRemaningEstimate($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getRemaningEstimate($issue);
    }

    public function getAffectVir($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getAffectVir($issue);
    }

    public function getIssueType($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getIssueType($issue);
    }

    public function getProjectID($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getProjectIDAccordingToIssue($issue);
    }

    public function getProject($issue) {
        $this->load->model('dbModel');
        return $this->dbModel->getProjectNameByID($this->getProjectID($issue));
    }

    public function getVersion($pid) {
        $this->load->model('dbModel');

        return $result = $this->dbModel->getVersionIDByProjectID($pid);
    }

}
