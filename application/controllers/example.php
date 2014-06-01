<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Example extends CI_Controller {

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
        $user = $this->dbModel->getUserNameById($this->session->userdata("uID"));
        $keyErr = "";
        $nameErr = "";
        $urlErr = "";
        $projectLeadErr = "";
        $data['userLoged'] = $user;
        $data['keyErr'] = $keyErr;
        $data['nameErr'] = $nameErr;
        $data['urlErr'] = $urlErr;
        $data['projectLeadErr'] = $projectLeadErr;
        $data['results'] = $this->getUserListToArray();
        $this->load->view('ci_simplicity/createProject', $data);
    }

    public function getUserListToArray() {
        $this->load->model('dbModel');
        $result = $this->dbModel->getUsersList();
        return $result;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function valideAndInsert() {
        $keyErr = "(optional)";
        $nameErr = "(optional)";
        $urlErr = "";
        $projectLeadErr = "(optional)";
        $statesName = FALSE;
        $statesKey = FALSE;
        $statesUrl = TRUE;
        $statesProjectLead = FALSE;
        if (isset($_POST['create'])) {
            $name = $_POST['name'];
            $key = $_POST['key'];
            $url = $_POST['url'];
            $projectLead =$this->session->userdata("uID");
            $defaultAssignee = $_POST['defaultAssignee']; //check
            $description = $_POST['description'];
            $notifyScheme = $_POST['notifyScheme']; //check
            $permissionScheme = $_POST['permissionScheme']; //check
            $date = date("Y-m-d");

            if ($_SERVER["REQUEST_METHOD"] == "POST") { // validation
                $this->load->model('validationModel');

                $returnName = $this->validationModel->checkName($_POST["name"]);
                $returnKey = $this->validationModel->checkKey($_POST["key"]);
                $returnUrl = $this->validationModel->checkURL($_POST["url"]);
                $returnProjectLead = $this->validationModel->checkProjectLead($_POST["projectLead"]);

                //validate name and print error
                if ($returnName == 1) {
                    $nameErr = "<br/>       <font color='red'>Name is required</font>";
                    $statesName = FALSE;
                } else if ($returnName == 2) {
                    $nameErr = " <br/>        <font color='red'>Only letters and white space allowed</font>";
                    $statesName = FALSE;
                } else {
                    $statesName = TRUE;
                }

                //validate key and print error
                if ($returnKey == 1) {
                    $keyErr = " <br/>       <font color='red'>Key feild can not be empty</font>";
                    $statesKey = FALSE;
                } else if ($returnKey == 3) {

                    $keyErr = " <br/>      <font color='red'> Key should contain 3 letters</font>";
                    $statesKey = FALSE;
                } else if ($returnKey == 4) {
                    $statesKey = FALSE;
                    $keyErr = " <br/>       <font color='red'>Key alrady exist</font>";
                } else {
                    $keyErr = '';
                    $statesKey = TRUE;
                }


                //validate url and print error
                if ($returnUrl == 1) {
                    $urlErr = " <br/>       <font color='red'>Invalid URL</font>";
                    $statesUrl = FALSE;
                } else {
                    $statesUrl = TRUE;
                }

                //validate project leader and print error
                if ($returnProjectLead == 1) {
                    $projectLeadErr = " <br/>       <font color='red'>Plese select a Project Lead</font>";
                    $statesProjectLead = FALSE;
                } else {
                    ///if project lead is assigne
                    $statesProjectLead = TRUE;
                }
            }

            if ($statesKey == TRUE && $statesProjectLead == TRUE && $statesName == TRUE && $statesUrl == TRUE) {
                $this->load->model('dbModel');
                $this->dbModel->InsertNewProject($key, $name, $projectLead, $defaultAssignee, $description, $notifyScheme, $permissionScheme, $date, $url);
                // $_SESSION['key']=$_POST['key'];
                redirect('ProjectFundAllocationController?pID=' . $key);
            } else {
                // exit();
                $data['userLoged'] = $projectLead;
                $data['results'] = $this->getUserListToArray();
                $data['keyErr'] = $keyErr;
                $data['nameErr'] = $nameErr;
                $data['urlErr'] = $urlErr;
                $data['projectLeadErr'] = $projectLeadErr;
                $this->load->view('ci_simplicity/createProject', $data);
            }
        }
    }

}
