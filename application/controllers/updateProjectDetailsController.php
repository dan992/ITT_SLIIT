<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class updateProjectDetailsController extends CI_Controller {

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
        
        $keyErr = "";
        $nameErr = "";
        $urlErr = "";
        $projectLeadErr = "";
        $data['keyErr'] = $keyErr;
        $data['nameErr'] = $nameErr;
        $data['urlErr'] = $urlErr;
        $data['projectLeadErr'] = $projectLeadErr;

        // for get avalible users list
        $data['results'] = $this->getUserListToArray();

        // for set project deatils
        $this->load->model('dbModel');
        $proDetails = $this->dbModel->getFullProjectDetails($key);
        foreach ($proDetails->result_array() as $row) {
            $data['getName'] = "{$row['name']}";
            $data['getKey'] = "{$row['key']}";
            $data['getUrl'] = "{$row['url']}";
            $data['getPrjectLead'] = $this->dbModel->getUserNameById($row['projectLead']);
            $data['getDescripition'] = "{$row['description']}";
            $data['getNotifyScheme'] = "{$row['notifactionSchema']}";
            $data['getPermissionScheme'] = "{$row['permrssionSchema']}";
            $data['getDefaultAssigneeID'] = "{$row['defaultAssignee']}";
            $data['getDefaultAssignee'] = $this->dbModel->getUserNameById($row['defaultAssignee']);
        }
        $this->load->view('ci_simplicity/updateProjectDetails', $data);
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
            $projectLead = $this->session->userdata("uID");
            $defaultAssignee = $_POST['defaultAssignee']; //check
            $description = $_POST['description'];
            $notifyScheme = $_POST['notifyScheme']; //check
            $permissionScheme = $_POST['permissionScheme']; //check
           // $date = date("Y-m-d");

            if ($_SERVER["REQUEST_METHOD"] == "POST") { // validation
                $this->load->model('validationModel');

                $returnName = $this->validationModel->checkName($_POST["name"]);
                //$returnKey = $this->validationModel->checkKey($_POST["key"]);
                $returnUrl = $this->validationModel->checkURL($_POST["url"]);
                $returnProjectLead = $this->validationModel->checkProjectLead($projectLead);

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

            if ( $statesProjectLead == TRUE && $statesName == TRUE && $statesUrl == TRUE) {
                $this->load->model('dbModel');
                $this->dbModel->updateProject($key, $name, $projectLead, $defaultAssignee, $description, $notifyScheme, $permissionScheme);
                redirect('ProjectFundAllocationController?pID=' . $key);
            } else {
                // exit();
                $data['results'] = $this->getUserListToArray();
                $data['keyErr'] = $keyErr;
                $data['nameErr'] = $nameErr;
                $data['urlErr'] = $urlErr;
                $data['projectLeadErr'] = $projectLeadErr;
                $this->load->view('ci_simplicity/updateProjectDetails', $data);
            }
        }
    }

}
